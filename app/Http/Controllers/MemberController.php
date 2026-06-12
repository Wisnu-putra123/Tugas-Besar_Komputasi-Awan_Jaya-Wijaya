<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data anggota dari database
        $members = Member::all(); 
        
        return view('member.index', compact('members'));
    }
}
