<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightTargetRequest;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightTargetController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WeightTargetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeightTargetRequest $request)
    {
        $user = Auth::user();

        // 既存の目標体重がある場合は更新、なければ作成
        $weightTarget = $user->weightTarget;

        if ($weightTarget) {
            $weightTarget->update([
                'target_weight' => $request->target_weight,
            ]);
        } else {
            $user->weightTarget()->create([
                'target_weight' => $request->target_weight,
            ]);
        }

        return redirect()->route('weight_logs.index')
            ->with('success', '目標体重を設定しました');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $weightTarget = Auth::user()->weightTarget;
        return view('weight_targets.edit', compact('weightTarget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WeightTargetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(WeightTargetRequest $request)
    {
        $user = Auth::user();

        // 既存の目標体重がある場合は更新、なければ作成
        $weightTarget = $user->weightTarget;

        if ($weightTarget) {
            $weightTarget->update([
                'target_weight' => $request->target_weight,
            ]);
        } else {
            $user->weightTarget()->create([
                'target_weight' => $request->target_weight,
            ]);
        }

        return redirect()->route('weight_logs.index')
            ->with('success', '目標体重を更新しました');
    }
}
