<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;
use DateTime;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;


/**
 * @extends ModelResource<PostCategory>
 */
class PostCategoryResource extends ModelResource
{
    protected string $model = PostCategory::class;

    protected string $title = 'PostCategories';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Title', 'name'),
            Date::make('Created At', 'created_at')->sortable(),
            Date::make('Updated At', 'updated_at')->sortable(),
            
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Title', 'name'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Title', 'name'),
            Date::make('Created At', 'created_at'),
            Date::make('Updated At', 'updated_at'),
            HasMany::make(
                'Post',
                'posts',
                fn($item)=>"$item->name",
                PostResource::class)->afterFill(fn($field)=>$field->setColumn('post_category_id')),
        ];
    }

    /**
     * @param PostCategory $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    
}
