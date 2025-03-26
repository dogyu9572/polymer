<div class="sub-top sub<?=$gNum?>">
	<div class="visual">
		<div class="title">
			<h2><?=$gName?></h2>
			<h3><?=$sName?></h3>
		</div>
	</div>
	<div class="breadcrumb">
		<div class="inner">
			<a href="/conference/" class="home"><span class="blind">Home</span></a>
			<div class="loca">
				<button type="button"><?=$gName?></button>
				<ul>
					<li class="<?if($gNum=="01"){?>active<?}?>"><a href="/conference/intro/intro_1.php" class="depth1">Introduction</a></li>
					<li class="<?if($gNum=="02"){?>active<?}?>"><a href="/conference/program/program_1.php" class="depth1">Program</a></li>
					<li class="<?if($gNum=="03"){?>active<?}?>"><a href="/conference/abstract/abstract_1.php" class="depth1">Call for Abstract</a></li>
					<li class="<?if($gNum=="04"){?>active<?}?>"><a href="/conference/register/register_1.php" class="depth1">Registration</a></li>
					<li class="<?if($gNum=="05"){?>active<?}?>"><a href="/conference/exhibit/exhibit_1.php" class="depth1">Exhibition</a></li>
				</ul>
			</div>
			<div class="loca sec">
				<button type="button"><?=$sName?></button>
				<ul>
				<?if($gNum=="01"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/conference/intro/intro_1.php">Welcome Message</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/conference/intro/intro_2.php">Organizer</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/conference/intro/intro_3.php">Transportation & Accommodation</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/conference/intro/intro_4.php">Official Letter</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/conference/intro/intro_5.php">Future Meetings</a></li>
				<?}elseif($gNum=="02"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/conference/program/program_1.php">Timetable</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/conference/program/program_2.php">Sessions</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/conference/program/program_3.php">Speakers</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/conference/program/program_4.php">Floor Plan</a></li>
				<?}elseif($gNum=="03"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/conference/abstract/abstract_1.php">Abstract Submission</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/conference/abstract/abstract_31.php">Search & Edit</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/conference/abstract/abstract_4.php">Bookmark </a></li>
				<?}elseif($gNum=="04"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/conference/register/register_1.php">Registration</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/conference/register/register_login.php">Registration Check</a></li>
				<?}elseif($gNum=="05"){?>
					<li class="<?if($sNum=="01"){?>active<?}?>"><a href="/conference/exhibit/exhibit_1.php">Infomation</a></li>
					<li class="<?if($sNum=="02"){?>active<?}?>"><a href="/conference/exhibit/exhibit_2.php">Application</a></li>
					<li class="<?if($sNum=="05"){?>active<?}?>"><a href="/conference/exhibit/exhibit_5.php">Search & Edit</a></li>
					<li class="<?if($sNum=="03"){?>active<?}?>"><a href="/conference/exhibit/exhibit_3.php">Booth Plan</a></li>
					<li class="<?if($sNum=="04"){?>active<?}?>"><a href="/conference/exhibit/exhibit_4.php">Exhibitor List</a></li>
				<?}?>
				</ul>
			</div>
		</div>
	</div>
</div>