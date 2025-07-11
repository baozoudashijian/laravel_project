<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        // 获取name和age参数
        $name = $request->input('name');
        $age = $request->input('age');
        // 检查参数是否存在
        if (!$name || !$age) {
            return response()->json(['error' => 'Name and age are required'], 400);
        }
        // 检查age是否为数字
        if (!is_numeric($age)) {
            return response()->json(['error' => 'Age must be a number'], 400);
        }
        // 检查age是否在合理范围内
        if ($age < 0 || $age > 120) {
            return response()->json(['error' => 'Age must be between 0 and 120'], 400);
        }
        $result = DB::table('tbl_admin_role_permission')->insert([
            'name' => $name,
            'age' => $age,
        ]);
        // 检查插入是否成功
        if (!$result) {
            return response()->json(['error' => 'Failed to add user'], 500);
        }else {
            return response()->json(['message' => 'User added successfully']);
        }
    }
    public function update(Request $request)
    {
        // 获取id、name和age参数
        $id = $request->input('id');
        $name = $request->input('name');
        $age = $request->input('age');
        // 检查参数是否存在
        if (!$id) {
            return response()->json(['error' => 'ID are required'], 400);
        }
        // 更新的话必须有一个name或age，如果都没有则返回错误，还需要检验age是否在合理范围内
        if (!$name && !$age) {
            return response()->json(['error' => 'At least one of name or age is required'], 400);
        }
        // 如果提供了name，检查name是否存在
        if ($name && !is_string($name)) {
            return response()->json(['error' => 'Name must be a string'], 400);
        }
        // 如果提供了age，检查age是否为数字
        if ($age && !is_numeric($age)) {
            return response()->json(['error' => 'Age must be a number'], 400);
        }
        // 如果提供了age，检查age是否在合理范围内
        if ($age && ($age < 0 || $age > 120)) {
            return response()->json(['error' => 'Age must be between 0 and 120'], 400);
        }
        // 如果提供了name或age，进行更新
        $updateData = [];
        if ($name) {
            $updateData['name'] = $name;
        }
        if ($age) {
            $updateData['age'] = $age;
        }

        $result = DB::table('tbl_admin_role_permission')
            ->where('id', $id)
            ->update($updateData);
        // 检查更新是否成功
        if ($result === false) {
            return response()->json(['error' => 'Failed to update user'], 500);
        } elseif ($result === 0) {
            return response()->json(['message' => 'No changes made or user not found']);
        } else {
            return response()->json(['message' => 'User updated successfully']);
        }
    }
}
