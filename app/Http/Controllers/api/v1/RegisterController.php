<?php
namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function registerBash(Request $request)
    {
        $input = $request->all();

        $validateUser = User::where('email', $input['email'])->first();

        if(isset($validateUser)){

          $authenticate = $this->authenticateBash($input);

          return $authenticate;

        } else {

          $validator = Validator::make($request->all(), [
              'email' => 'required|email|unique:users',
              'password' => 'required'
          ]);

          if($validator->fails()){
              return "ERROR: PLEASE FILL ALL THE FIELDS WITH THE RIGHT FORMAT (PASSWORD MIN: 6)";
          }

          $input['name'] = "BASH USER";
          $input['password'] = bcrypt($input['password']);
          $user = User::create($input);
          $success['token'] =  $user->createToken('MyApp')->accessToken;
          $success['user'] =  $user;

          return $success['token'];
        }
    }

    public function authenticateBash($data)
    {
      if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
          $user = Auth::user();
          $success['token'] =  $user->createToken('MyApp')->accessToken;
          $success['user'] =  $user;

          return $success['token'];
      }
      else{
          return "THESE CREDENTIALS DOES NOT MATCH OUT RECORDS";
      }
    }


}
