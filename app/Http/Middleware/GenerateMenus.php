<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Konekt\Menu\Facades\Menu;

class GenerateMenus
{
    public function handle($request, Closure $next)
    {
		if ($appshellMenu = Menu::get('appshell')) {
			$appshellMenu->removeItem('crm_group');
			$appshellMenu->removeItem('shop');

			if(Auth::user()->hasPermissionTo('list patients'))
				$appshellMenu->addItem('patients', __('Patients'), ['route' => 'patients.all']);

			if(Auth::user()->hasPermissionTo('list doctors'))
				$appshellMenu->addItem('doctors', __('Doctors'), ['route' => 'doctors.all']);

			if(Auth::user()->hasPermissionTo('list departments'))
				$appshellMenu->addItem('departments', __('Departments'), ['route' => 'departments.all']);
		}

        return $next($request);
    }
}
