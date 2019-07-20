<?php

namespace App\Http\Controllers;

use App\RequestLog;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestLogs = RequestLog::orderBy('id', 'desc')
            ->paginate(30);

        return view('dashboard.analytics.index', [
            'requestLogs' => $requestLogs,
            'tab' => 'analytics-requests'
        ]);
    }

}
