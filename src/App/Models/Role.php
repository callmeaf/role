<?php

namespace Callmeaf\Role\App\Models;

use Callmeaf\Base\App\Models\BaseModel;
use Callmeaf\Base\App\Models\Contracts\BaseConfigurable;
use Callmeaf\Base\App\Traits\Model\BaseModelMethods;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Role extends \Spatie\Permission\Models\Role implements BaseConfigurable
{
    use BaseModelMethods;

    public static function configKey(): string
    {
        return 'callmeaf-role';
    }

    protected function casts(): array
    {
        return [
            ...(self::config()['enums'] ?? []),
        ];
    }

    public function nameText(): Attribute
    {
        return Attribute::get(function() {
            $enumTranslate = \Base::enumCaseTranslator(
                \Base::getPackageNameFromModel(model: self::class),
                $this->name,
            );

            if(App::currentLocale() === 'fa') {
                return $this->name_fa ?? $enumTranslate;
            }

            return $enumTranslate;
        });
    }
}
