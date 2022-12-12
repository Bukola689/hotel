<?php

namespace App\Repository\Admin\Item;

use App\Models\Item;
use Illuminate\Http\Request;

interface IItemRepository
{
    public function saveItem(Request $request, array $data);

    public function updateItem(Request $request, Item $item, array $data);

    public function removeItem(Item $item);
}