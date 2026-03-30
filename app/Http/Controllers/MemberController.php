<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
        $members = Member::latest()->paginate(5);
        return view('members.index', compact('members'));
    }

    public function create() {
        return view('members.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        Member::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil didaftarkan.');
    }

    public function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Data anggota diperbarui.');
    }

    public function destroy(Member $member) {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
