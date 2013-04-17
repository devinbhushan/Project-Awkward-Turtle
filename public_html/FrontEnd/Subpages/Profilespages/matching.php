<?php


$unpw = $_COOKIE["user"];
$myemail = strtolower(strtok($unpw, "/"));

//The doubly linked list itself
class matcheslist
{
	public $_head;     
	public $_tail;
	public $_count;

    	function __construct() {
        	$this->_firstNode = NULL;
        	$this->_lastNode = NULL;
        	$this->_count = 0;
    	}
}

//The elements in the list
class matches
{
	public $next;
    	public $previous;
	public $matchnumber;
	public $email;
	public $gender;
	public $picturelink;
	public $matchesarr;
	public $age;
	public $fname;
	public $lname;
	public $checkct;
	function __construct() {
		$this->next = NULL;
		$this->previous = NULL;
		$this->matchnumber = 0;
		$this->email = "";
		$this->gender = "";
		$this->picturelink = "";
		$this->matchesarr = NULL;
		$this->age = 0;
		$this->fname = "";
		$this->lname = "";
		$this->checkct=0;
	}
}



//Fixes the array so multi-choice ones are in the same element
function arrayshift($temp)
{
	$choices = Array();
	//Hometown
	for($i = 0; $i < 2; $i++)
	{
		$choices[0][$i]=$temp[$i+8];
	}
	//Movies
	for($i = 0; $i < 3; $i++)
	{
		$choices[1][$i]=$temp[$i+10];
	}
	//Music
	for($i = 0; $i < 3; $i++)
	{
		$choices[2][$i] = $temp[$i+13];
	}
	//Sports
	for($i = 0; $i < 3; $i++)
	{
		$choices[3][$i] = $temp[$i+16];
	}
	//Major
	for($i = 0; $i < 2; $i++)
	{
		$choices[4][$i] = $temp[$i + 19];
	}
	//Hobbies
	for($i = 0; $i < 3; $i++)
	{
		$choices[5][$i] = $temp[$i + 21];
	}
	//Books
	for($i = 0; $i < 3; $i++)
	{
		$choices[6][$i] = $temp[$i + 24];
	}
	return $choices;
}


//Used to get the rankings given an email
function getpriorities($theemail)
{
	$priorities = Array();
	for($i = 1; $i < count($theemail); $i++)
	{
		$priorities[$i-1] = $theemail[$i];
	}
	return $priorities;
}

//Checks for partial matches in movies and books
function movies_books_check($user1, $user2)
{
	if($user1 == "Action/Adventure")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Drama" || $user2[$i]=="Thriller")
				{
					return 1;
				}
			}
		}
	}
	else if($user1 == "Thriller")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Drama" || $user2[$i]=="Action/Adventure")
				{
					return 1;
				}
			}
		}
	}
	else if($user1 == "Scary/Horror")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Thriller")
				{
					return 1;
				}
			}
		}	
	}
	else if($user1 == "Romance")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Comedy")
				{
					return 1;
				}
			}
		}	
	}
	else if($user1 == "Comedy")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Romance")
				{
					return 1;
				}
			}
		}	
	}
	else if($user1 == "SciFi/Fantasy")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Action/Adventure")
				{
					return 1;
				}
			}
		}	
	}
	else if($user1 == "Drama")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i] != NULL)
			{
				if($user2[$i]=="Thriller")
				{
					return 1;
				}
			}
		}		
	}
}

//Guessing a bit on this one, any suggestions/changes are welcome
function music_check($user1, $user2)
{
	if($user1 == "Oldies")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				return 0;
			}
		}
	}
	else if($user1 == "80's/90's")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i] == "Pop")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Country")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Alternative")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Hip-Hop/Rap")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="R&B")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "R&B")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i] == "Hip-Hop/Rap" || $user2[$i]=="Pop")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Pop")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="R&B" || $user2[$i]=="Alternative")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Alternative")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Rock" || $user2[$i]=="Pop")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Rock")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Alternative" || $user2[$i] == "Metal")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Metal")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Rock")
				{
					return 1;
				}
			}
		}		
	}
}


function hobbies_check($user1, $user2)
{
	if($user1 == "Sports")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Exercise" || $user2[$i]=="Friends")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Exercise")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Sports")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Video Games")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="TV/Movies" || $user2[$i]=="Music")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Friends")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Clubs/Organizations")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "TV/Movies")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Music" || $user2[$i]=="Video Games")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Music")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="TV/Movies" || $user2[$i]=="Video Games")
				{
					return 1;
				}
			}
		}		
	}
	else if($user1 == "Clubs/Organizations")
	{
		for($i = 0; $i < 3; $i++)
		{
			if($user2[$i]!= NULL)
			{
				if($user2[$i]=="Friends")
				{
					return 1;
				}
			}
		}		
	}
}


//The compare function for hometown and major
function majorhometown($user1, $user2, $ranking1, $ranking2, $type)
{
	$total = 0;
	$total1= 0;
	$total2= 0;
	global $Hometownflag, $Majorflag;
	if($user1[0]==$user2[0])
	{
		$total1+=1;
		$total2+=1;
		if($user1[1]==$user2[1])
		{
			$total1+=1;
			$total2+=1;
			if($type == "Hometown")
			{
				$Hometownflag = 1;
			}
			else if($type == "Major")
			{
				$Majorflag = 1;
			}
		}
	}
	$total1 = $total1 * $ranking2;
	$total2 = $total2 * $ranking1;
	$total = $total1 + $total2;
	return $total;
}

//The same comparison function applies to most
function comparefn($user1, $user2, $ranking1, $ranking2, $type)
{
	$total = 0;
	$total1 = 0;
	$total2 = 0;
	$count[0] = -1;
	$count[1] = -1;
	$count[2] = -1;
	$size1 = 0;
	$size2 = 0;
	global $Movieflag, $Musicflag, $Booksflag, $Hobbiesflag, $Sportsflag;
	//3 choices for each
	if($user1[2]!=NULL && $user2[2]!=NULL)
	{
		$size1 = 3; 
		$size2 = 3;
		for($i = 0; $i < 3; $i++)
		{
			for($j = 0; $j < 3; $j++)
			{
				if($user1[$i]==$user2[$j])
				{
					$total1+=1;
					$total2+=1;
					$count[$i]=1;
					break;
				}
				if($j==2)
				{
					$count[$i]=0;
				}
			}
		}
	}
	//2 choices for each
	else if($user1[2]==NULL && $user2[2]==NULL)
	{
		$size1 = 2;
		$size2 = 2;
		for($i = 0; $i < 2; $i++)
		{
			for($j = 0; $j < 2; $j++)
			{
				if($user1[$i]==$user2[$j])
				{
					$total1+=1;
					$total2+=1;
					$count[$i]=1;
					break;
				}
				if($j==1)
				{
					$count[$i]=0;
				}
			}
		}
	}
	//1 choice for each
	else if($user1[1]==NULL && $user2[1]==NULL)
	{
		$size1 = 1;
		$size2 = 1;
		if($user1[0]==$user2[0])
		{
			$total1 += 1;
			$total2 += 1;
			$count[0] = 1;
		}
		else
		{
			$count[0] = 0;	
		}
	}
	//1 and 3 choices
	else if($user1[1]==NULL && $user2[2]!=NULL)
	{
		$size1 = 1;
		$size2 = 3;
		for($j = 0; $j < 3; $j++)
		{
			if($user1[0]==$user2[$j])
			{
				$total1+=1;
				$total2+=1;
				$count[0] = 1;
				break;
			}
			if($j == 2)
			{
				$count[0] = 0;
			}
		}
	}
	//3 and 1 choices
	else if($user2[1]==NULL && $user1[2]!=NULL)
	{
		$size1 = 3;
		$size2 = 1;
		for($i = 0; $i < 3; $i++)
		{
			if($user1[$i]==$user2[0])
			{
				$total1+=1;
				$total2+=1;
				$count[$i]=1;
				break;
			}
			$count[$i]=0;
		}
	}
	//2 and 3 choices
	else if($user1[2]==NULL && $user2[2]!=NULL)
	{
		$size1 = 2;
		$size2 = 3;
		for($i = 0; $i < 2; $i++)
		{
			for($j = 0; $j < 3; $j++)
			{
				if($user1[$i]==$user2[$j])
				{
					$total1+=1;
					$total2+=1;
					$count[$i]=1;
					break;
				}
				if($j==2)
				{
					$count[$i]=0;
				}
			}
		}
	}
	//3 and 2 choices
	else if($user2[2]==NULL && $user1[2]!=NULL)
	{
		$size1 = 3;
		$size2 = 2;
		for($i = 0; $i < 3; $i++)
		{
			for($j = 0; $j < 2; $j++)
			{
				if($user1[$i]==$user2[$j])
				{
					$total1+=1;
					$total2+=1;
					$count[$i]=1;
					break;
				}
				if($j==1)
				{
					$count[$i]=0;
				}
			}
		}
	}
	else if($user1[2]==NULL && $user2[1] == NULL)
	{
		$size1 = 2;
		$size2 = 1;
		for($i = 0; $i < 2; $i++)
		{
			if($user1[$i]==$user2[0])
			{
				$total1+=1;
				$total2+=1;
				$count[$i]=1;
				break;
			}
		}
	}
	//1 and 2 choices
	else if($user1[1]==NULL && $user2[2] == NULL)
	{
		$size1 = 1;
		$size2 = 2;
		for($j = 0; $j < 2; $j++)
		{
			if($user1[0] == $user2[$j])
			{
				$total1+=1;
				$total2+=1;
				$count[0]=1;
				break;
			}
			if($j==1)
			{
				$count[0]=0;
			}
		}
	}
	$holder = 0;
	$counter = 0;
	//partial match check
	$min = 0;
	if($total1 <= $total2)
	{
		$min = $total1;
	}
	else
	{
		$min = $total2;
	}
	if($total1 != $min && $total2 != $min)
	{
		$holder = 0.5;
		//Built in partial match, if the school or state is the same
		if($type == "Sports")
		{
			$counter = 0;
		}
		//Since the genres are the same, the partial matches are the same
		else if($type == "Movies" || $type == "Books")
		{
			if($count[0]==0)
			{
				$counter += movies_books_check($user1[0], $user2);
			}
			if($count[1]==0)
			{
				$counter += movies_books_check($user1[1], $user2);
			}
			if($count[2]==0)
			{
				$counter += $count = movies_books_check($user1[2], $user2);
			}
		}
		//Calls the music check function
		else if($type == "Music")
		{
			if($count0==0)
			{
				$counter += music_check($user1[0], $user2);
			}
			if($count[1]==0)
			{
				$counter += music_check($user1[1], $user2);
			}
			if($count[2]==0)
			{
				$counter += music_check($user1[2], $user2);
			}
		}
		//Calls the hobbies comparison function
		else if($type == "Hobbies")
		{
			if($count[0]==0)
			{
				$counter += hobbies_check($user1[0], $user2);
			}
			if($count[1]==0)
			{
				$counter += hobbies_check($user1[1], $user2);
			}
			if($count[2]==0)
			{
				$counter += hobbies_check($user1[2], $user2);
			}
		}
	}

	if($counter != 0)
	{
		$total1 += $counter * $holder;
		$total2 += $counter * $holder;
	}
	if($total1 + $total2 >= 3 || ($min == 1 && ($total1 + $total2 == 2)))
	{
		if($type == "Movies")
		{
			$Movieflag = 1;
		}
		else if($type == "Music")
		{
			$Musicflag = 1;
		}
		else if($type == "Sports")
		{
			$Sportsflag = 1;
		}
		else if($type == "Hobbies")
		{
			$Hobbiesflag = 1;
		}
		else if($type == "Books")
		{
			$Booksflag = 1;
		}
	}
	$total1 = $total1 * $ranking2;
	$total2 = $total2 * $ranking1;
	$total = $total1 + $total2;
	return $total;
}

function middlelist($head, $tail)
{
	$i = 0;
	$iterator = $head;
	while($iterator != $tail)
	{
		$iterator = $iterator->next;
		$i++;
	}
	$iterator = $head;
	$j = 0;
	while($j < ($i/2))
	{
		$iterator = $iterator->next;
		$j++;
	}
	return $iterator;
}

function sublistlength($head, $tail)
{
	$i = 0;
	while($head != $tail)
	{
		$i++;
		$head = $head->next;
	}
	return $i;
}

function bsearch($thelist, $head, $tail, $newentry)
{
	$middle = middlelist($head, $tail);
	if(sublistlength($head, $tail) == 1)
	{
		$tail->previous = $newentry;
		$newentry->next = $tail;
		$head->next = $newentry;
		$newentry->previous = $head;
		return;
	}
	$newnumber = $newentry->matchnumber;
	$middlenumber = $middle->matchnumber;
	$headnumber = $head->matchnumber;
	$tailnumber = $tail->matchnumber;
	$newcheck = $newentry->checkct;
	$middlecheck = $middle->checkct;
	$headcheck = $head->checkct;
	$tailcheck = $tail->checkct;
	if($newnumber < $middlenumber || ($newnumber == $middlenumber && $newcheck >= $middlecheck))
	{	
		if($newnumber >= $tailnumber)
		{
	
			return bsearch($thelist, $middle, $tail, $newentry);
		}
	}
	if($newnumber <= $headnumber)
	{	
		if($newnumber > $middlenumber || ($newnumber == $middlenumber && $newcheck >= $middlecheck))
		{

			return bsearch($thelist, $head, $middle, $newentry);
		}
	}
}

function insert($thelist, $head, $tail, $newentry)
{
	bsearch($thelist, $head, $tail, $newentry);
	$thelist->count++;
	return;
	
}

function remove($thelist, $head, $tail, $newentry)
{
	bsearch($thelist, $head, $tail, $newentry);
	$usermatches->tail = $usermatches->tail->previous;
	$usermatches->tail->next->previous = NULL;
	$usermatches->tail->next = NULL;
	return;

}

//The de facto main section is below

//This chunk sets up the database
$con = mysql_connect("localhost", "awkwardt", "Gx61JXuJpaU@");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("awkwardt_schema", $con);

//Gets the user's information, given his email address
//myemail is set above to use sessions
$holder = mysql_query("SELECT * FROM USERS WHERE email = '$myemail'");
if($holder === FALSE) 
{
    die(mysql_error()); 
}
$fetchUser = mysql_fetch_row($holder);


//Get the user's array from the above information
$user = Array();
$user = arrayshift($fetchUser);


//Gets the user's location that night
$userloc = mysql_fetch_assoc(mysql_query("SELECT checkin AS ul FROM USERS WHERE email = '$myemail'"));
$userloc = $userloc['ul'];


//Get the check-in count of the user and increment it
$checkct=mysql_fetch_assoc(mysql_query("SELECT Count AS ct FROM Checkins INNER JOIN USERS ON Checkins.email = '$myemail'"));
$checkct=$checkct['ct'];
$checkct++;
$incremented = "UPDATE Checkins SET Count = '$checkct' WHERE Email = '$myemail'";
mysql_query($incremented);


//Gets all the other email addresses
$others = mysql_query("SELECT email FROM USERS");
if($others===FALSE)
{
	die(mysql_error());
}
$i = 0;
while ($row = mysql_fetch_array($others, MYSQL_ASSOC)) 
{
    $otherpeople[$i] =  $row['email']; 
    $i++;
}

//Gets the total number of those, for for loops' sake
$numberofpeople = count($otherpeople);

//For the sake of being thorough, makes sure the email used is the same type as later
for($i = 0; $i < $numberofpeople; $i++)
{
	if($otherpeople[$i]==$myemail)
	{
		$myemail = strtolower($otherpeople[$i]);
		break;
	}
}


//Initializes my data structure that stores the matches
$usermatches = new matcheslist();
$usermatches->_head = NULL;
$usermatches->_tail = NULL;

//Get the total  number of rankings in the database
$result = mysql_query("SELECT * FROM Rankings"); 
$num_rows = mysql_num_rows($result); 
$num_rows = $num_rows * 7;

//Eliminating those who entered only ones in signing up so they don't skew the average
$apathycount = 0;
for($i = 0; $i < $numberofpeople; $i++)
{
	$theemail = $otherpeople[$i];
	$myholder = mysql_query("SELECT * FROM Rankings WHERE email = '$theemail'");
	$fetchMe = mysql_fetch_row($myholder);
	$flag = 0;
	for($j = 0; $j < count($fetchMe); $j++)
	{
		if($fetchMe[$j+1]>1 && $fetchMe[$j+1]!=NULL)
		{
			$flag = 1; 
			break;
		}
	}
	if($flag==0)
	{
		$apathycount++;
	}
}

//Eliminate the irrelevant number of entries
$num_rows -= 7*$apathycount;


//Get the total sum of all of the entries in the database
$totalct = 0;
$htct = mysql_fetch_assoc(mysql_query("SELECT SUM(HomeTownPri) AS htp FROM Rankings"));
$totalct = $htct['htp'];
$moct = mysql_fetch_assoc(mysql_query("SELECT SUM(MoviePri) AS mp FROM Rankings"));
$totalct+=$moct['mp'];
$muct = mysql_fetch_assoc(mysql_query("SELECT SUM(MusicPri) AS mup FROM Rankings"));
$totalct+=$muct['mup'];
$spct = mysql_fetch_assoc(mysql_query("SELECT SUM(SportPri) AS sp FROM Rankings"));
$totalct+=$spct['sp'];
$mact = mysql_fetch_assoc(mysql_query("SELECT SUM(MajorPri) AS map FROM Rankings"));
$totalct+=$mact['map'];
$hoct = mysql_fetch_assoc(mysql_query("SELECT SUM(HobbyPri) AS hp FROM Rankings"));
$totalct+=$hoct['hp'];
$boct = mysql_fetch_assoc(mysql_query("SELECT SUM(BookPri) AS bp FROM Rankings"));
$totalct+=$boct['bp'];

//Eliminate the irrelevant total from the count
$totalct -= 7*$apathycount;

//Scale that number to form a floor
if($num_rows != 0)
{
	$floor = $totalct/$num_rows;
}
else
{
	$floor = 1;
}
$floor = (380/10)*$floor*0.35;

//The loop that iterates through the people and actually does the checking/math
for($j = 0; $j < $numberofpeople; $j++)
{
	//get the email itself
	$email = strtolower($otherpeople[$j]);
	$otherloc = mysql_fetch_assoc(mysql_query("SELECT checkin AS loc FROM USERS WHERE email = '$email'"));
	$otherloc = $otherloc['loc'];
	if($email != $myemail && $otherloc == $userloc && $otherloc != NULL)
	{
		//Get the array for the user
		$myholder = mysql_query("SELECT * FROM USERS WHERE email = '$myemail'");
		$fetchMe = mysql_fetch_row($myholder);
		$secmyholder = mysql_query("SELECT * FROM Rankings INNER JOIN USERS ON Rankings.email = '$myemail'");
		$secfetchMe = mysql_fetch_row($secmyholder);
		$userpriorities  = getpriorities($secfetchMe);
$userct=mysql_fetch_assoc(mysql_query("SELECT Count AS cnt FROM Checkins INNER JOIN USERS ON Checkins.email = '$myemail'"));
$checkct=$checkct['cnt'];

		//Get the array for the user gotten by the for loop
		$holder = mysql_query("SELECT * FROM USERS WHERE email = '$email'");
		$fetchUser = mysql_fetch_row($holder);
		$secholder = mysql_query("SELECT * FROM Rankings INNER JOIN USERS ON Rankings.email = '$email'");
		$secfetchUser = mysql_fetch_row($secholder);
		$priorities = getpriorities($secfetchUser);
$otherct=mysql_fetch_assoc(mysql_query("SELECT Count AS oct FROM Checkins INNER JOIN USERS ON Checkins.email = '$email'"));
$otherct=$otherct['oct'];

		//Shift the arrays to make them usable
		$otherarray = Array();
		$myarray = Array();
		$otherarray = arrayshift($fetchUser);
		$myarray = arrayshift($fetchMe);
		
//Initialize flags for the checking of what really matched, setting up the global flags
$Hometownflag = 0;
$Movieflag = 0;
$Musicflag = 0;
$Sportsflag = 0;
$Majorflag = 0;
$Hobbiesflag = 0;
$Booksflag = 0;
		//Count up the total
		$total = 0; 
		$total += majorhometown($myarray[0], $otherarray[0], $userpriorities[0], $priorities[0], "Hometown");
		$total += comparefn($myarray[1], $otherarray[1], $userpriorities[1], $priorities[1], "Movies");
		$total += comparefn($myarray[2], $otherarray[2], $userpriorities[2], $priorities[2], "Music");
		$total += comparefn($myarray[3], $otherarray[3], $userpriorities[3], $priorities[3], "Sports");
		$total += majorhometown($myarray[4], $otherarray[4], $userpriorities[4], $priorities[4], "Major");
		$total += comparefn($myarray[5], $otherarray[5], $userpriorities[5], $priorities[5], "Hobbies");
		$total += comparefn($myarray[6], $otherarray[6], $userpriorities[6], $priorities[6], "Books");
		//Check to see if the number is big enough
		if($total >= $floor)
		{
			$newmatch = new matches();
			$newmatch->checkct=$otherct;
			$newmatch->email = $fetchUser[0];
			$newmatch->fname = $fetchUser[2];
			$newmatch->lname = $fetchUser[3];
			$newmatch->gender = $fetchUser[26];
			$newmatch->picturelink = $fetchUser[27];
			$newmatch->matchnumber = $total;
			$birthm = $fetchUser[4];
			$birthd = $fetchUser[5];
			$birthy = $fetchUser[6];
			$actualyear = date('Y');
			$actualmonth = date('m');
			$actualday = date('d');
			$age = $actualyear - $birthy;
			if($birthm >= $actualmonth)
			{
				if($birthd > $actualday)
				{
					$age--;
				}
			}
			$newmatch->age = $age;
			if($Hometownflag == 1)
			{
				$Matches[0]= "Hometown";
			}
			else if($Hometownflag != 1)
			{
				$Matches[0]=NULL;
			}
			if($Moviesflag == 1)
			{
				$Matches[1]="Movies/TV";
			}
			else if($Hometownflag != 1)
			{
				$Matches[1]=NULL;
			}
			if($Musicflag == 1)
			{
				$Matches[2]="Music";
			}
			else if($Musicflag != 1)
			{
				$Matches[2]=NULL;
			}
			if($Sportsflag == 1)
			{
				$Matches[3] = "Sports";
			}
			else if($Sportsflag != 1)
			{
				$Matches[3]=NULL;
			}
			if($Majorflag == 1)
			{
				$Matches[4] = "Major";
			}
			else if($Majorflag != 1)
			{
				$Matches[4] = NULL;
			}
			if($Hobbiesflag == 1)
			{
				$Matches[5] = "Hobbies";
			}
			else if($Hobbiesflag != 1)
			{
				$Matches[5] = NULL;
			}
			if($Booksflag == 1)
			{
				$Matches[6] = "Books";
			}
			else if($Booksflag != 1)
			{
				$Matches[6] = NULL;
			}
			$newmatch->matchesarr = $Matches;
			$i = 0;
			if($usermatches->head == NULL)
			{
				$usermatches->head = $newmatch;
				$usermatches->tail = $newmatch;
				$usermatches->count = 1;
				$newmatch->next = NULL;
				$newmatch->previous = NULL;
			}
			else
			{
				if($usermatches->count == 20)
				{
					if($newmatch->matchnumber < $usermatches->tail->matchnumber)
					{
						continue;
					}
					else if($newmatch->matchnumber == $usermatches->tail->matchnumber)
					{
						if($newmatch->checkct > $usermatches->tail->checkct)
						{
							$newmatch->previous = $usermatches->tail->previous;
							$usermatches->tail->previous->next = $newmatch;
							$newmatch->next = NULL;
							$usermatches->tail->previous = NULL;
							$usermatches->tail = $newmatch;
							continue;
						}
						else
						{
							continue;
						}
						
					}
					else if($newmatch->matchnumber > $usermatches->head->matchnumber)
					{
						$newmatch->previous = NULL;
						$newmatch->next = $usermatches->head;
						$usermatches->head->previous = $newmatch;
						$usermatches->head = $newmatch;
						continue;
					}
					else if($newmatch->matchnumber == $usermatches->head->matchnumber)
					{
						if($newmatch->checkct > $usermatches->head->checkct)
						{
							$newmatch->next = $usermatches->head;
							$usermatches->head->previous = $newmatch;
							$usermatches->head = $newmatch;
							$usermatches->tail = $usermatches->tail->previous;
							$usermatches->tail->next->previous = NULL;
							$usermatches->tail->next=NULL;
							continue;
						}
						else
						{
							$newmatch->previous = $usermatches->head;
							$newmatch->next = $usermatches->head->next;
							$usermatches->head->next->previous = $newmatch;
							$usermatches->head->next = $newmatch;
							$usermatches->tail = $usermatches->tail->previous;
							$usermatches->tail->next->previous = NULL;
							$usermatches->tail->next = NULL;
							continue;
						}
					}
					remove($usermatches, $usermatches->head, $usermatches->tail, $newmatch);
				}
				else
				{

					if($newmatch->matchnumber < $usermatches->tail->matchnumber)
					{

						$newmatch->next = NULL;
						$newmatch->previous = $usermatches->tail;
						$usermatches->tail->next = $newmatch;
						$usermatches->tail = $newmatch;
						$usermatches->count++;
						continue;
					}
					else if($newmatch->matchnumber == $usermatches->tail->matchnumber)
					{
						if($newmatch->checkct > $usermatches->tail->checkct)
						{
				
							$newmatch->next = $usermatches->tail;
							$newmatch->previous = $usermatches->tail->previous;
							$usermatches->tail->previous = $newmatch;
							$newmatch->previous->next = $newmatch;
							$usermatches->count++;
							continue;
						}
						else
						{
							$usermatches->tail->next = $newmatch;
							$newmatch->previous = $usermatches->tail;
							$newmatch->next = NULL;
							$usermatches->tail = $newmatch;
							$usermatches->count++;
							continue;
						}
					}
					else if($newmatch->matchnumber > $usermatches->head->matchnumber)
					{
						$newmatch->next = $usermatches->head;
						$usermatches->head->previous = $newmatch;
						$newmatch->previous = NULL;
						$usermatches->head = $newmatch;
						$usermatches->count++;
						continue;
					}
					else if($newmatch->matchnumber == $usermatches->head->matchnumber)
					{
						if($newmatch->checkct > $usermatches->head->checkct)
						{
							$newmatch->next = $usermatches->head;
							$usermatches->head->previous = $newmatch;
							$usermatches->head = $newmatch;
							$usermatches->count++;
							continue;
						}
						else
						{
							$newmatch->next = $usermatches->head->next;
							$newmatch->previous = $usermatches->head;
							$usermatches->head->next = $newmatch;
							$newmatch->next->previous = $newmatch;
							$usermatches->count++;
							continue;
						}
					}
					insert($usermatches, $usermatches->head, $usermatches->tail, $newmatch);
				}

			}
		}
	}
}	
//At this point, the linked list is made, so it's time to print
//The columns are a picture, age, gender, and things that matched
echo "</br>";
if($usermatches->count == 0)
{
	echo "<th>" . "You Have No Matches :'(" . "</th>";
}
else
{
	$iterator = $usermatches->head;
	echo "<tr>" . "<th>" . "A Picture of the match" . "</th>" . "<th>" . "Match's age" . "</th>" . "<th>" . "Match's gender" . "</th>" . "<th>" . "What Matched?" . "</th>" . "<th>" . "Contact Them?" . "</th>" . "</tr>";
	$_SESSION["0"] = $usermatches->count;
	for($i = 0; $i < $usermatches->count; $i++)
	{
		$tempHold = $i+1;
		$_SESSION['$tempHold'] = $iterator->email;
		echo "<tr>" . "<td>";
		if($iterator->picturelink ==NULL)
		{
			echo "</td>";
		}
		else
		{
			echo "<img src = \"/FrontEnd/Subpages/Signuppages/$iterator->picturelink\" style=\"width=50px; height=50px;\">" . "</td>";
		}
		echo "<td>" . $iterator->age . "</td>" . "<td>" . $iterator->gender . "</td>";
		echo "<td>";
		for($j = 0; $j < 7; $j++)
		{
			if($iterator->matchesarr[$j] != NULL)
			{
				echo $iterator->matchesarr[$j];
				$flag = 0;
				for($k = $j+1; $k < 7; $k++)
				{
					if($iterator->matchesarr[$k]!=NULL)
					{
						$flag = 1;
					}
				}
				if($flag==1)
				{	
					echo ", ";
				}
				else
				{
					break;
				}
			}
		}
		echo "</td>" . "<td>" . "<form method=\"POST\"id=\"contact\" action=\"../email/mail.php\"><input type=\"hidden\" name=\"recipient\" value=\"" . $iterator->email . "\" /><input type=\"submit\" value='Contact Them!'></input></form>" . "</td>" . "</tr>";
		$iterator = $iterator->next;
	}
	}

?>