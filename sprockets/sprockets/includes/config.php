<?php
//config.php

//this enables pages to know their own names
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
define('DEBUG',TRUE); #we want to see all errors
//this clears date errors of all sorts
date_default_timezone_set('America/Los_Angeles');

//This is inside of an H1 in the header.php files
$banner='Banner goes here';

$nav1['index.php']='Main Page';
//$nav1['template.php']='Template';
$nav1['contact.php']='Contact Us';
$nav1['daily.php']='Daily special';
$nav1['customers.php']='Customers';
$nav1['cocktails_list.php']='Cocktails';

$heros[] = '<img src="images/coulson.png" />';
$heros[] = '<img src="images/fury.png" />';
$heros[] = '<img src="images/hulk.png" />';
$heros[] = '<img src="images/thor.png" />';
$heros[] = '<img src="images/black-widow.png" />';
$heros[] = '<img src="images/captain-america.png" />';
$heros[] = '<img src="images/machine.png" />';
$heros[] = '<img src="images/iron-man.png" />';
$heros[] = '<img src="images/loki.png" />';
$heros[] = '<img src="images/giant.png" />';
$heros[] = '<img src="images/hawkeye.png" />';


//planets.php
//loads an array named $planets with images and text for daily rotation

$planets[] = '
<p><img src="images/mercury.gif" style="float:left; margin:0 10px 10px 0" />Mercury concerns communication and short-distance travel. Language, words, speech.</p>
<p>
Through the position of Mercury in your horoscope you can see the areas that will be of most interest to you and stimulate your mental energies.</p>
';

$planets[] = '
<p><img src="images/venus.gif" style="float:left; margin:0 10px 10px 0" />Venus is the planet of love, beauty, art, aesthetics, value, fairness, socializing and relationships.</p>
<p>
The planet Venus astrologically represents the desire to bring together things that compliment each other. There is a strong need to create harmony and balance in the environment and in relationships.</p>
';

$planets[] = '
<p><img src="images/mars.gif" style="float:left; margin:0 10px 10px 0" />Mars represents how we assert ourselves in the world. The warrior archetype. anger, sexuality, war, sports.</p>
</p>
<p>
Through the position of Mars in your horoscope you can see what best motivates someone to go after what they want in life. An understanding of this desire can help you to be the instinctive master of your life.
</p>
';

$planets[] = '
<p><img src="images/jupiter.gif" style="float:left; margin:0 10px 10px 0" />Jupiter is the planet of expansion. International travel. Faith belief, the religious impulse. Higher education. Law, philosophy, ethics.
</p>
<p>
The position of Jupiter in your horoscope chart describes how you grow and evolve in the relative area of your life. The house position of Jupiter represents your desire and your search for meaning in your life.
</p>
';

$planets[] = '
<p><img src="images/saturn.gif" style="float:left; margin:0 10px 10px 0" />Saturn is the planet of restriction. Boundaries, tests, limitations. Manifestation. Hard work, responsibility.
</p>
<p>
The key is knowing how to work with the transits and cycles of Saturn because we do feel the the effects of it for a while since it is in a sign for about 2 1/2 years at a time.</p>
<p>
It completes its first trip around the zodiac by the age of thirty and its second just before the age of sixty. This marks the beginnings of middle and old age. Understanding the transits of Saturn provides a sense of self awareness this is of benefit here.
</p>
';

$planets[] = '
<p><img src="images/uranus.gif" style="float:left; margin:0 10px 10px 0" />Uranus is the planet of disruption, liberation, sudden changes. Revolution Technology.
</p>
<p>
In general all Uranus ruled changes have several things in common: 
They strike like lightning. They tend to turn a person\'s world upside down. They are frequently beyond the control of the person involved.</p>
<p>
The changes are radical and cannot as a rule be reversed e.g. personal achievement, status in society -- public honour or notoriety; accidents; impersonal relationships.
</p>
';

$planets[] = '
<p><img src="images/neptune.gif" style="float:left; margin:0 10px 10px 0" />This is the planet of transcendence. Illusion, delusion, image, spirituality, mysticism.
</p>
<p>
As the planet Neptune continually moves around the zodiac it passes over different areas in your personal birth chart. Since it is such a slow moving planet it will impact you for long periods of time.</p>
<p>
As an area is touched by Neptune it is best to know how that is affecting you. If it is a creative, inspirational impact then it is best to make use of it. On other hand it may point to times when you have to be more careful in your due diligence when it comes to both work and home life.
</p>
';

$planets[] = '
<p><img src="images/pluto.gif" style="float:left; margin:0 10px 10px 0" />Pluto is the planet of death and rebirth. The underworld. Taboos. Eroticism and Shadow. Healing and regeneration.</p>
<p>
The zodiac sign positions of Pluto are considered to possess great historical significance. Fundamental upheavals and drastic transformations in areas of human life and civilization are expected when Pluto travels through the different signs. Pluto passing through each zodiac sign is always considered to produce a change of a permanent nature.</p>
';



switch (THIS_PAGE)
{
     
     case 'index.php':      
         $title = 'Main Page';
         $pic=randomize($heros);
       $plant=rotate($planets);
    break;
        
    //case 'template.php':      
      //   $title = 'Template';       
    //break;
    
    case 'contact.php':      
         $title = 'Contact Us';
         $pic=randomize($heros); 
        $plant=rotate($planets);
    break;
        
    case 'daily.php':      
         $title = 'Daily Special';
    break;
        
    default:
        $title = THIS_PAGE;   
        
}


//stores datebase login info
include 'credentials.php';
    
    

function makelinks($nav)
{
   $myReturn="";
    
    foreach($nav as $url => $text){
        
        if(THIS_PAGE==$url)
        {
         $myReturn .= '<li class="current"><a href="' . $url . '">' . $text . '</a></li>';  
        }
        else
        {
        $myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>';  
        }
              
    }
    
  return $myReturn;
}
  

function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
		echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
		die();
    }
}


function randomize ($arr)
{//randomize function is called in the right sidebar - an example of random (on page reload)
	if(is_array($arr))
	{//Generate random item from array and return it
		return $arr[mt_rand(0, count($arr) - 1)];
	}else{
		return $arr;
	}
}#end randomize()

function rotate ($arr)
{//rotate function is called in the right sidebar - an example of rotation (on day of month)
	if(is_array($arr))
	{//Generate item in array using date and modulus of count of the array
		return $arr[((int)date("j")) % count($arr)];
	}else{
		return $arr;
	}
}#end rotate
