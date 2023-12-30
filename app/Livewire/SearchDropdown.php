<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $searchQuery = '';
    public $articles = [];

    public function render()
    {
        $articles = $this->articles;
        return view('livewire.search-dropdown', compact('articles'));
    }

    public function search()
    {
        $this->articles = [];

        if ($this->searchQuery) {
            // Perform the search query and retrieve matching articles
            $this->articles = Article::where('title', 'like', '%' . $this->searchQuery . '%')->get();
//            dd($this->articles);
        }
    }
}
