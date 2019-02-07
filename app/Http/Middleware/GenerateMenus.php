<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Konekt\Menu\Facades\Menu;

class GenerateMenus
{
    public function handle($request, Closure $next)
    {
		$appshellMenu = Menu::get('appshell');
		$authUser = Auth::user();

		if ($appshellMenu && $authUser) {
			$appshellMenu->removeItem('crm_group');
			$appshellMenu->removeItem('shop');

			if($authUser->hasPermissionTo('list patients'))
				$appshellMenu->addItem('patients', __('Patients'), ['route' => 'patients.all']);

			if($authUser->hasPermissionTo('list doctors'))
				$appshellMenu->addItem('doctors', __('Doctors'), ['route' => 'doctors.all']);

			if($authUser->hasPermissionTo('list departments'))
				$appshellMenu->addItem('departments', __('Departments'), ['route' => 'departments.all']);
		}

        return $next($request);
    }
}
