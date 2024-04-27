<?php namespace App\Traits;

trait Translatable
{
    /**
     * @param $info
     * Created by <Rhiss.net>
     */
    public function createLang($info)
    {
        $info['lang'] = \Lang::locale();
        self::create($info);
        $langs = config('app.other_locales');
        foreach ($langs as $lang) {
            if ($lang != \Lang::locale()) {
                $info['lang'] = $lang;
                self::create($info);
            }
        }
    }

    /**
     * @param $info
     * Created by <Rhiss.net>
     */
    public function updateLang($info)
    {
        self::where(["$this->foregeinKey" => $info[$this->foregeinKey], 'lang' => \Lang::locale()])->update($info);
    }
}