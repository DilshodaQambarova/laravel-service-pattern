<?php
namespace App\Traits;
trait TranslationTrait
{
    protected function prepareTranslations(array $translations, array $columns): array
    {
        $preparedTranslations = [];

        foreach ($translations as $translation) {
            foreach ($translation as $lang => $value) {
                // dd();
                // foreach ($translation[$lang] as $lang => $value) {
                    # code...
                    if (!isset($preparedTranslations[$lang])) {
                        $preparedTranslations[$lang] = [];
                    }

                    foreach ($columns as $column) {
                        if (isset($value[$column])) {
                            $preparedTranslations[$lang][$column] = $value[$column];
                        } else {
                            info("{$column} not set for language: $lang");
                        }
                    // }
                }
            }
        }

        return $preparedTranslations;
    }
}
