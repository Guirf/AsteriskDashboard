<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestingController extends Component {
    public $message = 'teste';

    public function render() {
        return view('livewire.testing-controller');
    }
}
