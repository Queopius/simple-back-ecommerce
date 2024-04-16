<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\Forms\UserForm;
use App\Http\Requests\User\{StoreUserRequest, UpdateUserRequest};

class UsersController extends BaseAdminController
{
    public function index(Request $request)
    {
        $users = $this->user->listUsers($request);

        return view('admin.users.index', [
            'users' => $users,
            'user' => $this->user,
            'trashed' => $this->user->countUsersTrashed,
            'view' => $this->hasRouteTrashOrIndex('admin.users.trashed'),
            'text_pagination' => $this->user
                    ->textPaginations($users, $users->total(), 'users')
        ]);
    }

    public function create()
    {
        return $this->edit(new User);
    }

    public function store(StoreUserRequest $request)
    {
        $request->createUser();

        return redirect()->back()
            ->with('toast_success', trans('User created with success!.'));
    }

    public function edit(User $user)
    {
        return new UserForm('admin.users.form', $user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->updateUser($user);

        return redirect()
            ->route('admin.users')
            ->with('toast_success', trans('User updated with success!.'));
    }

    public function restore($id)
    {
        User::withTrashed()
                ->where('id', $id)->first()
                ->restore();

        return redirect()->route('admin.users.trashed', $id)
                ->with('toast_success', 'User was restored with success!');
    }

    public function trash(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->with(['user' => $user])
            ->with('toast_success', 'User "'.$user->username.'" was deleted with success!.');
    }

    public function destroy($id)
    {
        $this->user->onlyTrashed()
                    ->where('id', $id)
                    ->firstOrFail()->forceDelete();

        return redirect()
            ->route('admin.users.trashed', $this->user->id)
            ->with('toast_success', 'User was destroyed with success!.');
    }
}
