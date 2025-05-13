<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Enums\PermissionLevel;

class CardUser extends Component
{
    public string $userName;
    public string $userEmail;
    public int $userId;
    public PermissionLevel $permission;
    public function __construct( string $userName, string $userEmail,int $userId, PermissionLevel $permission)
      {
          $this->userName = $userName;
          $this->userEmail = $userEmail;
          $this->userId = $userId;
          $this->permission = $permission;
      }
  
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-user');
    }
}
