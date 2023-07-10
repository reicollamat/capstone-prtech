<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use App\Orchid\Layouts\Product\ProductEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductEditScreen extends Screen
{
    /**
     * @var Product
     */
    public $product;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Product $product): iterable
    {
        $product->all();

        return [
            'product' => $product
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->product->exists ? 'Edit Product' : 'Create Product';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Product details';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->confirm('Once the product is deleted, all of its resources and data will be permanently deleted.')
                ->method('remove')
                ->canSee($this->product->exists),

            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),

            Link::make(__('Cancel'))
                ->icon('bs.x-circle')
                ->route('platform.products')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(ProductEditLayout::class)
                ->title(__('Product Information'))
                ->description(__('Update the product\'s information.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->product->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Product $product)
    {
        $product->delete();

        Toast::info(__('Product was removed'));

        return redirect()->route('platform.products');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Product $product, Request $request)
    {
        // $request->validate([

        // ])


        // create unique slug from product title attribute
        $titleslug = Str::slug($request->collect('product')->get('title'));
        $slug = SlugService::createSlug(Product::class, 'slug', $titleslug);


        $product
            ->fill($request->collect('product')->toArray())
            ->fill(['slug' => $slug])
            ->save();


        Toast::info(__('Product was saved.'));

        return redirect()->route('platform.products');
    }
}
