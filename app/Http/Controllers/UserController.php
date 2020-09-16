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
        $users = $this->model;
        if(request()->with){
            $params = explode(",", request()->with);
            $users = $users->with($params)->get();
        }else{
            $users = $this->model->all();
        }

        return $this->returnJson($users);
    }

    public function view(Request $request, string $user)
    {
        $data = $this->model->with('phone')->where('fullname', urldecode($user))->first();
      
        if($data){
            return $this->returnJson($data, 200);    
        }else{
            return $this->returnJson($data, 404, 'error');
        }
        
        
    }
}
