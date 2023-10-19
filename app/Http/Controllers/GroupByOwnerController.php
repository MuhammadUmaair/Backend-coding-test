<?php

namespace App\Http\Controllers;

use App\Services\GroupByOwnersService;
use Illuminate\Http\Request;

class GroupByOwnerController extends Controller
{
    public function processData(Request $request)
    {
        $data = ["insurance.txt" => "Company A", "letter.docx" => "Company A", "Contract.docx" => "Company B"];
        $groupByOwnersService = new GroupByOwnersService();
        $groupedData = $groupByOwnersService->groupByOwners($data);
        return view('groupByOwnerService.view', ['groupedData' => $groupedData]);
    }
}
