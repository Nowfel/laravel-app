<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\AuthInterface;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request)
    {
        $user = $this->authRepository->register($request->all());

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $user = $this->authRepository->login($request->all());

        return response()->json($user);
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout();

        return [
            'message' => 'Logged out'
        ];
    }
}
