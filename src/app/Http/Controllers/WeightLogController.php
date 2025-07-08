<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightLogRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // 体重ログを取得（最新順）
        $weightLogs = $user->weightLogs()
            ->orderBy('date', 'desc')
            ->paginate(8);

        // 目標体重を取得
        $targetWeight = optional($user->weightTarget)->target_weight;

        // 現在の体重（最新の記録）
        $currentWeight = optional(
            $user->weightLogs()->orderBy('date', 'desc')->first()
        )->weight;

        // 前回の体重（2番目に新しい記録）
        $previousWeight = optional(
            $user->weightLogs()->orderBy('date', 'desc')->skip(1)->first()
        )->weight;

        // 差分計算
        $diff = null;
        if ($currentWeight !== null && $targetWeight !== null) {
            $diff = $targetWeight - $currentWeight;
        }

        return view('weight_logs.index', compact(
            'weightLogs',
            'targetWeight',
            'currentWeight',
            'previousWeight',
            'diff'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight_logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WeightLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeightLogRequest $request)
    {
        $user = Auth::user();

        // 同じ日付の記録が既に存在するかチェック
        $existingLog = $user->weightLogs()
            ->where('date', $request->date)
            ->first();

        if ($existingLog) {
            return redirect()->back()
                ->withErrors(['date' => 'この日付の記録は既に存在します'])
                ->withInput();
        }

        // 体重ログを作成
        $user->weightLogs()->create([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight_logs.index')
            ->with('success', '体重データを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $weightLogId
     * @return \Illuminate\Http\Response
     */
    public function show($weightLogId)
    {
        $weightLog = Auth::user()->weightLogs()->findOrFail($weightLogId);
        return view('weight_logs.show', compact('weightLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $weightLogId
     * @return \Illuminate\Http\Response
     */
    public function edit($weightLogId)
    {
        $weightLog = Auth::user()->weightLogs()->findOrFail($weightLogId);
        return view('weight_logs.edit', compact('weightLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WeightLogRequest  $request
     * @param  int  $weightLogId
     * @return \Illuminate\Http\Response
     */
    public function update(WeightLogRequest $request, $weightLogId)
    {
        $user = Auth::user();
        $weightLog = $user->weightLogs()->findOrFail($weightLogId);

        // 同じ日付の他の記録が存在するかチェック（自分以外）
        $existingLog = $user->weightLogs()
            ->where('date', $request->date)
            ->where('id', '!=', $weightLogId)
            ->first();

        if ($existingLog) {
            return redirect()->back()
                ->withErrors(['date' => 'この日付の記録は既に存在します'])
                ->withInput();
        }

        // 体重ログを更新
        $weightLog->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect()->route('weight_logs.index')
            ->with('success', '体重データを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $weightLogId
     * @return \Illuminate\Http\Response
     */
    public function destroy($weightLogId)
    {
        $weightLog = Auth::user()->weightLogs()->findOrFail($weightLogId);
        $weightLog->delete();

        return redirect()->route('weight_logs.index')
            ->with('success', '体重データを削除しました');
    }

    /**
     * Search weight logs by date range.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $user = Auth::user();

        $query = $user->weightLogs()->orderBy('date', 'desc');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $weightLogs = $query->paginate(8);

        // 目標体重を取得
        $targetWeight = optional($user->weightTarget)->target_weight;

        // 現在の体重（最新の記録）
        $currentWeight = optional(
            $user->weightLogs()->orderBy('date', 'desc')->first()
        )->weight;

        // 前回の体重（2番目に新しい記録）
        $previousWeight = optional(
            $user->weightLogs()->orderBy('date', 'desc')->skip(1)->first()
        )->weight;

        // 差分計算
        $diff = null;
        if ($currentWeight !== null && $targetWeight !== null) {
            $diff = $targetWeight - $currentWeight;
        }

        return view('weight_logs.index', compact(
            'weightLogs',
            'targetWeight',
            'currentWeight',
            'previousWeight',
            'diff'
        ));
    }
}
