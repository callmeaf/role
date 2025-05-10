<?php

namespace Callmeaf\Role\App\Models;

use Callmeaf\Base\App\Models\BaseModel;
use Callmeaf\Base\App\Models\Contracts\BaseConfigurable;
use Callmeaf\Base\App\Traits\Model\BaseModelMethods;
use Callmeaf\Role\App\Enums\RoleName;
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
        $enumsCast = self::config()['enums'] ?? [];
        unset($enumsCast['name']);
        return [
            ...$enumsCast,
        ];
    }

    public function name(): Attribute
    {
        return Attribute::get(
            fn($value) => RoleName::tryFrom($value) ?: $value,
        );
    }

    public function nameText(): Attribute
    {
        return Attribute::get(function() {
            $currentLocale = App::currentLocale();

            if(! ($this->name instanceof \BackedEnum)) {
                if($currentLocale === 'fa') {
                    return $this->name_fa ?? $this->name;
                }
                return $this->name;
            }

            $enumTranslate = \Base::enumCaseTranslator(
                \Base::getPackageNameFromModel(model: self::class),
                $this->name,
            );

            if($currentLocale === 'fa') {
                return $this->name_fa ?? $enumTranslate;
            }

            return $enumTranslate;
        });
    }

}
