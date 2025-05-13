<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardUser extends Component
{
    public string $userName;
    public string $userEmail;
    public int $userId;
    public int $canDo;
    public function __construct( string $userName, string $userEmail,int $userId, int $canDo)
      {
          $this->userName = $userName;
          $this->userEmail = $userEmail;
          $this->userId = $userId;
          $this->canDo = $canDo;
      }
  
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-user');
    }
}
