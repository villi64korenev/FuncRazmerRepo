function getSizeRazmer($str)
{
    preg_match_all('/(размер)\D{0,15}((\d{1,5}\D{0,3})*)/', $str, $matches, PREG_SET_ORDER, 0);
    if(!$matches[0][2]){
        preg_match_all('/(раз)\D{0,15}((\d{1,5}\D{0,3})*)/', $str, $matches, PREG_SET_ORDER, 0);
    }
    if(!$matches[0][2]){
        preg_match_all('/(\s)((\d{1,5}\D{0,3})*)\D{0,5}(размер|маломер|большемер)/', $str, $matches, PREG_SET_ORDER, 0);
    }
    foreach ($matches as $key => $value) {
        if(preg_match_all('/см/', $value[2], $matches2, PREG_SET_ORDER, 0)){
            unset($matches[$key]);
        }
        $matches[$key] = preg_replace('/(\d)\D*$/', '$1', $value);

    }
    // print_r($matches);
    return $matches;
}
