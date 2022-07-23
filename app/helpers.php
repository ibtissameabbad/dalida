<?php

function currencySign($currency)
{
    if ($currency === 'dollar')
        return '$';
    else if ($currency === 'euro')
        return '€';
    return 'MAD';
}
