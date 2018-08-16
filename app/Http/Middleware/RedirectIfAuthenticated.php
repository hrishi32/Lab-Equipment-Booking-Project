<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $username=$request['username'];
        $password=$request['password'];

        $filter="(uid=$username)";
        $ldaprdn  = "uid=$username,ou=faculty,dc=iitmandi,dc=ac,dc=in";     // ldap rdn or dn
        $ldaprdn1  = "uid=$username,ou=staff,dc=iitmandi,dc=ac,dc=in";
        $ldaprdn2  = "uid=$username,ou=scholars,dc=iitmandi,dc=ac,dc=in";
        $ldaprdn3  = "uid=$username,ou=projects,dc=iitmandi,dc=ac,dc=in";
        $ldaprdn4  = "uid=$username,ou=students_pg,dc=iitmandi,dc=ac,dc=in";
        $ldaprdn5  = "uid=$username,ou=students_ug,dc=iitmandi,dc=ac,dc=in";
        $ldaprdn6  = "uid=$username,ou=guest,dc=iitmandi,dc=ac,dc=in";

        // connect to ldap server
        $ldapconn = @ldap_connect("users.iitmandi.ac.in")
            or die("Could not connect to LDAP server.");
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        if ($ldapconn)
        {
            $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $password);
                
            if(!$ldapbind) {
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn1, $password);
                $ldaprdn = $ldaprdn1;
            }

        	 if(empty($ldapbind)) {
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn2, $password);
                $ldaprdn = $ldaprdn2;
            }
                
            if(empty($ldapbind)){
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn3, $password);
                $ldaprdn = $ldaprdn3;
        	}
        
        	 if(empty($ldapbind)){
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn4, $password);
                $ldaprdn = $ldaprdn4;
                    }
                
        	 if(empty($ldapbind)){
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn5, $password);
                $ldaprdn = $ldaprdn5;
                    }
                
        	if(empty($ldapbind)){
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn6, $password);
                $ldaprdn = $ldaprdn6;
                    }
                
                
        	// verify binding
            if ($ldapbind){
                $attributes = array("employeeNumber", "sn", "givenName", "mail");
                $data = ldap_search($ldapconn, $ldaprdn, $filter );
                $entry = ldap_get_entries($ldapconn, $data);
                session_start();
                $_SESSION['username']= $username;
                $_SESSION['fname'] = $entry[0]["givenname"][0];
                $_SESSION['lname'] = $entry[0]["sn"][0];
                $_SESSION['email'] = $entry[0]["mail"][0];
                $_SESSION['id'] = $entry[0]["employeenumber"][0];
                
                // var_dump($_SESSION);
               
                $ldapUser = User::where('email', $entry[0]["mail"][0])
                                ->get();
                // var_dump ($ldapUser);
                if(count($ldapUser)){
                    User::where('email', $entry[0]["mail"][0])
                    ->update(['password' => Hash::make($password)]);

                    echo "Ldap Authorisation successful.";
                }
                else{
                    $ldap = new User();
                    $ldap->name =  $entry[0]["givenname"][0];
                    $ldap->email = $entry[0]["mail"][0];
                    $ldap->password = Hash::make($password);
                    $ldap->save();
                    echo "User Logged in successfully";
                }
                if(Auth::attempt(['email' => $entry[0]["mail"][0], 'password' => ($password)]) ){
                    // echo "Auth Attempt Successful.";
                }
                // return view('dashboard.calendar');
                return Redirect::intended();
                
            }
        }

        else{
            echo "Invalid Credentials";
                // header("location:index.php");
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
