<?php
namespace App\Http\Middleware;
use Closure;
use Konekt\Menu\Facades\Menu;

class GenerateMenus
{
    public function handle($request, Closure $next)
    {
		if ($appshellMenu = Menu::get('appshell')) {
			$appshellMenu->removeItem('crm_group');
			$appshellMenu->removeItem('shop');
			$appshellMenu->addItem('patients', __('Patients'), ['route' => 'patients.all']);
		}

        return $next($request);
    }
}
