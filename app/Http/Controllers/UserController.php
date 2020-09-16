<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\apiJsonReturnTrait;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use apiJsonReturnTrait;
    protected $model;


    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {

        $params = explode(",", request()->with);

        $users = $this->model->with($params)->get();

        return $this->returnJson($users);
    }

    public function view(Request $request, string $user)
    {
        
        $data = $this->model->with('phone')->where('fullname', urldecode($user))->get();
        
        return $this->returnJson($data);
    }
}
