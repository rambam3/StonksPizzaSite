<?php

namespace App;

enum BestelStatus : string
{
    case Initieel = 'Initieel';
    case Betaald = 'Betaald';
    case Bereiden = 'Bereiden';
    case Inoven = 'Inoven';
    case Onderweg = 'Onderweg';
    case Bezorgd = 'Bezorgd';
}
