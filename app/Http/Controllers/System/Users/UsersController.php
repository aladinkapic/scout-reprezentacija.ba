<?php

namespace App\Http\Controllers\System\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Core\Affiliation;
use App\Models\Core\Keywords\Keyword;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    protected $_path = 'system.app.users.';
    protected $_gender = [
        '0' => 'Muško',
        '1' => 'Žensko',
    ];

    public function index()
    {

        $users = User::where('id', '>', 0);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => 'Email',
            'address' => __('Adresa stanovanja'),
            'cityRel.title' => 'Grad',
            'country.title' => __('Država')
        ];

        return view($this->_path . '.index', [
            'filters' => $filters,
            'users' => $users
        ]);
    }

    public function create()
    {
        return view($this->_path . 'create', [
            'create' => true,
            'countries' => Affiliation::where('keyword', 'D')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id'),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            'position' => Keyword::where('keyword', 'position')->pluck('value', 'id'),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id'),
            'active' => Keyword::where('keyword', 'active')->pluck('value', 'id'),
        ]);
    }

    public function save(Request $request)
    {
        $request = $this::format($request);

        $request['password'] = Hash::make($request->password);
        $request->request->add(['api_token' => hash('sha256', $request->email . '+' . time())]);

        try {
            $user = User::create($request->all());
            return $this::success(route('system.users.preview', ['id' => $user->id]));
        } catch (\Exception $e) {
            return $this::error($e->getCode(), $e->getMessage());
        }
    }

    public function preview($id)
    {
        return view($this->_path . 'create', [
            'user' => User::find($id),
            'preview' => true,
            'countries' => Affiliation::where('keyword', 'D')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id'),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            'position' => Keyword::where('keyword', 'position')->pluck('value', 'id'),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id'),
            'active' => Keyword::where('keyword', 'active')->pluck('value', 'id'),
        ]);
    }

    public function edit($id)
    {
        return view($this->_path . 'create', [
            'user' => User::find($id),
            'edit' => true,
            'countries' => Affiliation::where('keyword', 'D')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'gender' => Keyword::where('keyword', 'gender')->pluck('value', 'id'),
            'sport' => Keyword::where('keyword', 'sport')->pluck('value', 'id'),
            'position' => Keyword::where('keyword', 'position')->pluck('value', 'id'),
            'leg_arm' => Keyword::where('keyword', 'arm_leg')->pluck('value', 'id'),
            'active' => Keyword::where('keyword', 'active')->pluck('value', 'id'),
        ]);
    }

    public function update(Request $request){

        try {
            $request['birth_date'] = Carbon::parse($request->birth_date)->format('Y-m-d');

            User::where('id', $request->id)->update($request->except('_method', '_token'));


            return $this::success(route('system.users.preview', ['id' => $request->id]));
        } catch (\Exception $e) {
            return $this::error($e->getCode(), $e->getMessage());
        }
    }

    // -------------------------------------------------------------------------------------------------------------- //

    public function profile()
    {
        return view($this->_path . 'create', [
            'user' => Auth::user(),
            'profile' => true,
            'countries' => Affiliation::where('keyword', 'D')->pluck('title', 'id')->prepend('Odaberite državu', ''),
            'municipalities' => Affiliation::where('keyword', 'O')->pluck('title', 'id')->prepend('Odaberite grad', ''),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request = $this::format($request);
        try {
            User::find($request->id)->update(
                $request->except(['_token', '_method', 'id'])
            );
            return $this::success(route('system.users.profile'));
        } catch (\Exception $e) {
            return $this::error($e->getCode(), $e->getMessage());
        }
    }
}
