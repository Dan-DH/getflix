DROP DATABASE getflix;
CREATE DATABASE getflix;
USE getflix;

CREATE TABLE users (
	userID int(10) not null primary key auto_increment,
	email varchar(255) not null,
	login varchar(255) not null,
	password varchar(255) not null,
	comment_count int(4) not null default 0,
	trailer_count int(4) not null default 0,
	acc_date datetime not null default now()
);

CREATE TABLE password_reset_temp(
	resetID int(10)not null primary key,
	email varchar(225) not null,
	user_key varchar(225) not null,
	expDate datetime notnull 
);

CREATE TABLE contact (
	messageID int(10) not null primary key auto_increment,
	name varchar(255) not null,
	email varchar(255) not null,
	issue varchar(225) not null,
	message varchar(255) not null,
	contact_date datetime not null default now()
);

CREATE TABLE comments (
	commentID int(10) not null primary key auto_increment,
	userID int(10) not null,
	movieID int(10) not null,
	comment varchar(255) not null,
	comment_date datetime not null default now()
);

CREATE TABLE movies (
	movieID int(10) not null primary key auto_increment,
	title varchar(255) not null,
	image varchar(255) not null,
	trailer varchar(255) not null,
	genre varchar(800) not null,
	rating float(2) not null,
	synopsis varchar(800) not null
);

CREATE TABLE achievements (
	userID int(10) not null primary key auto_increment,
	movie_achievement1 bit(1) not null default 0,
	movie_achievement3 bit(1) not null default 0,
	movie_achievement5 bit(1) not null default 0,
	comment_achievement1 bit(1) not null default 0,
	comment_achievement3 bit(1) not null default 0,
	comment_achievement5 bit(1) not null default 0,
	contact_achievement bit(1) not null default 0,
	account_achievement bit(1) not null default 0
);

-- INSERT INTO users (email, login, password) VALUES ("daniel@getflix.com", "Dan-DH", "holaworld");
-- INSERT INTO users (email, login, password) VALUES ("brigita@getflix.com", "Brigita Sabutyte", "12345");
-- INSERT INTO users (email, login, password) VALUES ("shivani@getflix.com", "ShivaniKhatri", "shivani");
-- INSERT INTO users (email, login, password) VALUES ("teosuperlongemailtoseewhathappens@getflix.co.uk", "Teo", "testpass");


INSERT INTO achievements () VALUES();
INSERT INTO achievements () VALUES();
INSERT INTO achievements () VALUES();
INSERT INTO achievements () VALUES();


INSERT INTO comments (userID, movieID, comment) VALUES (1, 1, "Watched this so much as a kid the VHS tape broke :)");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 1, "It's okay");

INSERT INTO comments (userID, movieID, comment) VALUES (3, 3, "NU;r8iJDY7E8SB-i:}G7)L@W;uY{.v@e&4&/hX7tF$t9E%Ztqk7VgUA+:H6((pTwV{HWG6KBQ#4,6M22bRR#QJfKFbL.Dwbq$/=-wi2X7X-v5z7%P39zR-G,D:/V85M!H[P%26%5$,e,L.P)_2Tt@[2e[@3qJmvyp6@qE+-27e$i+QF%XnM[etZ7VYEcPiQG*?ZzTmVg*%=rLe?kz/NiMBU_*ddY6;ACb(Li{zJ9+n3qwcCuZ#u6N.yeU:?Y7.j");

INSERT INTO comments (userID, movieID, comment) VALUES (4, 3, "The comment above mine is 255 characters long, the max allowed");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 3, "Making a bunch of comments on the same movie to check the autoscroll for the popup");

INSERT INTO comments (userID, movieID, comment) VALUES (2, 3, "That's a great idea");

INSERT INTO contact (name, email, issue, message) VALUES ("Pixie", "notindatabase@gmail.com", "Achievement not unlocking", "I want to unsubscribe for the service");

INSERT INTO contact (name, email, issue, message) VALUES ("Dixie", "daniel@getflix.com", "No movies in home", "Love this, you should charge more");


-- UPDATE achievements SET movie_achievement1 = 1, comment_achievement3 = 1 WHERE userID = 1;

-- UPDATE achievements SET movie_achievement1 = 1, movie_achievement3 = 1, movie_achievement5 = 1, comment_achievement1 = 1, comment_achievement3 = 1, comment_achievement5 = 1, contact_achievement = 1, achievements_all = 1 WHERE userID = 2;

-- UPDATE achievements SET movie_achievement1 = 1, movie_achievement3 = 1, movie_achievement5 = 1 WHERE userID = 3;

-- UPDATE achievements SET movie_achievement1 = 1, comment_achievement1 = 1 WHERE userID = 4;

--Movie list
 INSERT INTO `movies` VALUES (1,'Shang-Chi and the Legend of the Ten Rings', 'https://image.tmdb.org/t/p/w500/1BIoJGKbXjdFDAqUEiA2VHqkK1Z.jpg', 'https://www.youtube.com/embed/8YjFbMbfXaQ?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,14', 7.9, 'Shang-Chi must confront the past he thought he left behind when he is drawn into the web of the mysterious Ten Rings organization.'),(2,'Encanto', 'https://image.tmdb.org/t/p/w500/4j0PNHkMr5ax3IA8tjtxcmPU3QT.jpg', 'https://www.youtube.com/embed/CaimKeDcudo?rel=0&showinfo=0&wmode=opaque&html5=1', '12,16,35,10751,14,10402', 7.6, 'The tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal—every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional family\'s last hope.'),(3,'Spider-Man: No Way Home', 'https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg', 'https://www.youtube.com/embed/pBvH8hvnJPk?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,878,14', 0, 'Peter Parker is unmasked and no longer able to separate his normal life from the high-stakes of being a Super Hero. When he asks for help from Doctor Strange the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.'),(4,'Ciao Alberto', 'https://image.tmdb.org/t/p/w500/1SyTnaY0wte69oKdqxQLvxPT3hs.jpg', 'https://www.youtube.com/embed/KJZS7oXX5SE?rel=0&showinfo=0&wmode=opaque&html5=1', '16,35,10751,14', 7.7, 'With his best friend Luca away at school, Alberto is enjoying his new life in Portorosso working alongside Massimo - the imposing, tattooed, one-armed fisherman of a few words - who\'s quite possibly the coolest human in the entire world as far as Alberto is concerned. He wants more than anything to impress his mentor, but it\'s easier said than done.'),(5,'The Amazing Spider-Man', 'https://image.tmdb.org/t/p/w500/fSbqPbqXa7ePo8bcnZYN9AHv6zA.jpg', 'https://www.youtube.com/embed/WLxul0Vzuhk?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,14', 6.6, 'Peter Parker is an outcast high schooler abandoned by his parents as a boy, leaving him to be raised by his Uncle Ben and Aunt May. Like most teenagers, Peter is trying to figure out who he is and how he got to be the person he is today. As Peter discovers a mysterious briefcase that belonged to his father, he begins a quest to understand his parents\' disappearance – leading him directly to Oscorp and the lab of Dr. Curt Connors, his father\'s former partner. As Spider-Man is set on a collision course with Connors\' alter ego, The Lizard, Peter will make life-altering choices to use his powers and shape his destiny to become a hero.'),(6,'Spider-Man', 'https://image.tmdb.org/t/p/w500/gSZyYEK5AfZuOFFjnVPUCLvdOD6.jpg', 'https://www.youtube.com/embed/O7zvehDxttM?rel=0&showinfo=0&wmode=opaque&html5=1', '14,28', 7.2, 'After being bitten by a genetically altered spider at Oscorp, nerdy but endearing high school student Peter Parker is endowed with amazing powers to become the superhero known as Spider-Man.'),(7,'Luca', 'https://image.tmdb.org/t/p/w500/jTswp6KyDYKtvC52GbHagrZbGvD.jpg', 'https://www.youtube.com/embed/mYfJxlgR2jw?rel=0&showinfo=0&wmode=opaque&html5=1', '16,35,10751,14', 8, 'Luca and his best friend Alberto experience an unforgettable summer on the Italian Riviera. But all the fun is threatened by a deeply-held secret: they are sea monsters from another world just below the water’s surface.'),(8,'Jungle Cruise', 'https://image.tmdb.org/t/p/w500/9dKCd55IuTT5QRs989m9Qlb7d2B.jpg', 'https://www.youtube.com/embed/hJZ82pwwJqA?rel=0&showinfo=0&wmode=opaque&html5=1', '12,14,35,28', 7.7, 'Dr. Lily Houghton enlists the aid of wisecracking skipper Frank Wolff to take her down the Amazon in his dilapidated boat. Together, they search for an ancient tree that holds the power to heal – a discovery that will change the future of medicine.'),(9,'The Amazing Spider-Man 2', 'https://image.tmdb.org/t/p/w500/c3e9e18SSlvFd1cQaGmUj5tqL5P.jpg', 'https://www.youtube.com/embed/DlM2CWNTQ84?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,14', 6.4, 'For Peter Parker, life is busy. Between taking out the bad guys as Spider-Man and spending time with the person he loves, Gwen Stacy, high school graduation cannot come quickly enough. Peter has not forgotten about the promise he made to Gwen’s father to protect her by staying away, but that is a promise he cannot keep. Things will change for Peter when a new villain, Electro, emerges, an old friend, Harry Osborn, returns, and Peter uncovers new clues about his past.'),(10,'The Suicide Squad', 'https://image.tmdb.org/t/p/w500/kb4s0ML0iVZlG6wAKbbs9NAm6X.jpg', 'https://www.youtube.com/embed/eg5ciqQzmK0?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,14', 7.8, 'Supervillains Harley Quinn, Bloodsport, Peacemaker and a collection of nutty cons at Belle Reve prison join the super-secret, super-shady Task Force X as they are dropped off at the remote, enemy-infused island of Corto Maltese.'),(11,'Spider-Man 3', 'https://image.tmdb.org/t/p/w500/sqZKCRYGovZ8aN99VVJSdL8Ja9k.jpg', 'https://www.youtube.com/embed/wPosLpgMtTY?rel=0&showinfo=0&wmode=opaque&html5=1', '14,28,12', 6.3, 'The seemingly invincible Spider-Man goes up against an all-new crop of villains—including the shape-shifting Sandman. While Spider-Man’s superpowers are altered by an alien organism, his alter ego, Peter Parker, deals with nemesis Eddie Brock and also gets caught up in a love triangle.'),(12,'Mortal Kombat', 'https://image.tmdb.org/t/p/w500/nkayOAUBUu4mMvyNf9iHSUiPjF1.jpg', 'https://www.youtube.com/embed/jBa_aHwCbC4?rel=0&showinfo=0&wmode=opaque&html5=1', '28,14,12', 7.3, 'Washed-up MMA fighter Cole Young, unaware of his heritage, and hunted by Emperor Shang Tsung\'s best warrior, Sub-Zero, seeks out and trains with Earth\'s greatest champions as he prepares to stand against the enemies of Outworld in a high stakes battle for the universe.'),(13,'Ghostbusters: Afterlife', 'https://image.tmdb.org/t/p/w500/kHNWm8YDl1Pf6tyzluLagbtkU94.jpg', 'https://www.youtube.com/embed/lnKmAVLC3jU?rel=0&showinfo=0&wmode=opaque&html5=1', '35,14,12,878', 7.4, 'When a single mom and her two kids arrive in a small town, they begin to discover their connection to the original Ghostbusters and the secret legacy their grandfather left behind.'),(14,'The Croods: A New Age', 'https://image.tmdb.org/t/p/w500/tbVZ3Sq88dZaCANlUcewQuHQOaE.jpg', 'https://www.youtube.com/embed/hy4vAqF9Ko0?rel=0&showinfo=0&wmode=opaque&html5=1', '16,10751,12,14,35', 7.6, 'Searching for a safer habitat, the prehistoric Crood family discovers an idyllic, walled-in paradise that meets all of its needs. Unfortunately, they must also learn to live with the Bettermans -- a family that\'s a couple of steps above the Croods on the evolutionary ladder. As tensions between the new neighbors start to rise, a new threat soon propels both clans on an epic adventure that forces them to embrace their differences, draw strength from one another, and survive together.'),(15,'A Boy Called Christmas', 'https://image.tmdb.org/t/p/w500/1sRejtiHOZGggZd9RcmdqbapLM5.jpg', 'https://www.youtube.com/embed/aFI_aiidke0?rel=0&showinfo=0&wmode=opaque&html5=1', '10751,12,14', 8.2, 'An ordinary young boy called Nikolas sets out on an extraordinary adventure into the snowy north in search of his father who is on a quest to discover the fabled village of the elves, Elfhelm. Taking with him a headstrong reindeer called Blitzen and a loyal pet mouse, Nikolas soon meets his destiny in this magical and endearing story that proves nothing is impossible…'),(16,'Godzilla vs. Kong', 'https://image.tmdb.org/t/p/w500/pgqgaUx1cJb5oZQQ5v0tNARCeBp.jpg', 'https://www.youtube.com/embed/odM92ap8_c0?rel=0&showinfo=0&wmode=opaque&html5=1', '28,14,878', 7.9, 'In a time when monsters walk the Earth, humanity’s fight for its future sets Godzilla and Kong on a collision course that will see the two most powerful forces of nature on the planet collide in a spectacular battle for the ages.'),(17,'Finch', 'https://image.tmdb.org/t/p/w500/jKuDyqx7jrjiR9cDzB5pxzhJAdv.jpg', 'https://www.youtube.com/embed/-0bYWnP3jH4?rel=0&showinfo=0&wmode=opaque&html5=1', '878,18,12', 8.2, 'On a post-apocalyptic Earth, a robot, built to protect the life of his dying creator\'s beloved dog, learns about life, love, friendship, and what it means to be human.'),(18,'Amina', 'https://image.tmdb.org/t/p/w500/gII53HAH7UA1yx189vROMzWA5ib.jpg', 'https://www.youtube.com/embed/RW87asYGq7g?rel=0&showinfo=0&wmode=opaque&html5=1', '10752,36,18,12', 7, 'In 16th-century Zazzau, now Zaria, Nigeria, Amina must utilize her military skills and tactics to defend her family\'s kingdom. Based on a true story.'),(19,'Eternals', 'https://image.tmdb.org/t/p/w500/6AdXwFTRTAzggD2QUTt5B7JFGKL.jpg', 'https://www.youtube.com/embed/x_me3xsvDgk?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,878,18', 7.1, 'The Eternals are a team of ancient aliens who have been living on Earth in secret for thousands of years. When an unexpected tragedy forces them out of the shadows, they are forced to reunite against mankind’s most ancient enemy, the Deviants.'),(20,'Dhamaka', 'https://image.tmdb.org/t/p/w500/KowKEuyWziUtnCYicv6zhzTQIv.jpg', 'https://www.youtube.com/embed/qRESnWFYYho?rel=0&showinfo=0&wmode=opaque&html5=1', '53,18,80', 7.2, 'When a cynical ex-TV news anchor gets an alarming call on his radio show, he sees a chance for a career comeback — but it may cost his conscience.'),(21,'7 Prisoners', 'https://image.tmdb.org/t/p/w500/gWBtWTkWWp8v2BO5Fzn6JjEi9hv.jpg', 'https://www.youtube.com/embed/vupNkHJGBQ8?rel=0&showinfo=0&wmode=opaque&html5=1', '18,80', 7.5, 'An impoverished teen seeking to escape the clutches of a human trafficker must weigh living up to his moral code against his struggle to survive.'),(22,'After We Fell', 'https://image.tmdb.org/t/p/w500/dU4HfnTEJDf9KvxGS9hgO7BVeju.jpg', 'https://www.youtube.com/embed/NYdNN6C9hfI?rel=0&showinfo=0&wmode=opaque&html5=1', '10749,18', 7.2, 'Just as Tessa\'s life begins to become unglued, nothing is what she thought it would be. Not her friends nor her family. The only person that she should be able to rely on is Hardin, who is furious when he discovers the massive secret that she\'s been keeping. Before Tessa makes the biggest decision of her life, everything changes because of revelations about her family.'),(23,'Never Back Down: Revolt', 'https://image.tmdb.org/t/p/w500/icAG01wZyy1ZpS3UEnPReph3jMV.jpg', 'https://www.youtube.com/embed/SZ8X3uF1FQM?rel=0&showinfo=0&wmode=opaque&html5=1', '28,18', 6.4, 'An amateur fighter is lured by a trafficking syndicate specializing in elite underground fighting where her brutal captor forces her to fight or face certain death.'),(24,'Spider-Man: Homecoming', 'https://image.tmdb.org/t/p/w500/c24sv2weTHPsmDa7jEMN0m2P3RT.jpg', 'https://www.youtube.com/embed/xEvV3OsE2WM?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,878,18', 7.4, 'Following the events of Captain America: Civil War, Peter Parker, with the help of his mentor Tony Stark, tries to balance his life as an ordinary high school student in Queens, New York City, with fighting crime as his superhero alter ego Spider-Man as a new threat, the Vulture, emerges.'),(25,'Bruised', 'https://image.tmdb.org/t/p/w500/axibOQF9QnThrr8M37ufAYurP4R.jpg', 'https://www.youtube.com/embed/EMu8K0l8ggA?rel=0&showinfo=0&wmode=opaque&html5=1', '18', 6.7, 'Jackie Justice is a mixed martial arts fighter who leaves the sport in disgrace. Down on her luck and simmering with rage and regret years after the fight, she\'s coaxed into a brutal underground fight by her manager and boyfriend Desi and grabs the attention of a fight league promoter who promises Jackie a life back in the Octagon. But the road to redemption becomes unexpectedly personal when Manny - the son she gave up as an infant - shows up at her doorstep. A triumphant story of a fighter who reclaims her power, in and out of the ring, when everyone has counted her out'),(26,'House of Gucci', 'https://image.tmdb.org/t/p/w500/cy6fvTf9YqehVhReYnm5cc3GqhZ.jpg', 'https://www.youtube.com/embed/eGNnpVKxV6s?rel=0&showinfo=0&wmode=opaque&html5=1', '18,80,53', 7.1, 'When Patrizia Reggiani, an outsider from humble beginnings, marries into the Gucci family, her unbridled ambition begins to unravel the family legacy and triggers a reckless spiral of betrayal, decadence, revenge, and ultimately…murder.'),(27,'After We Collided', 'https://image.tmdb.org/t/p/w500/kiX7UYfOpYrMFSAGbI6j1pFkLzQ.jpg', 'https://www.youtube.com/embed/2SvwX3ux_-8?rel=0&showinfo=0&wmode=opaque&html5=1', '10749,18', 7.3, 'Tessa finds herself struggling with her complicated relationship with Hardin; she faces a dilemma that could change their lives forever.'),(28,'The Many Saints of Newark', 'https://image.tmdb.org/t/p/w500/dVoQSUomKuv12BUpuWTjaPThmyO.jpg', 'https://www.youtube.com/embed/d9Em4ckh878?rel=0&showinfo=0&wmode=opaque&html5=1', '18,80', 6.8, 'Young Anthony Soprano is growing up in one of the most tumultuous eras in Newark, N.J., history, becoming a man just as rival gangsters start to rise up and challenge the all-powerful DiMeo crime family. Caught up in the changing times is the uncle he idolizes, Dickie Moltisanti, whose influence over his nephew will help shape the impressionable teenager into the all-powerful mob boss, Tony Soprano.'),(29,'tick, tick...BOOM!', 'https://image.tmdb.org/t/p/w500/DPmfcuR8fh8ROYXgdjrAjSGA0o.jpg', 'https://www.youtube.com/embed/YJserno8tyU?rel=0&showinfo=0&wmode=opaque&html5=1', '18,10402', 8.1, 'On the cusp of his 30th birthday, Jonathon Larson, a promising young theater composer, navigates love, friendship, and the pressures of life as an artist in New York City.'),(30,'Venom: Let There Be Carnage', 'https://image.tmdb.org/t/p/w500/rjkmN1dniUHVYAtwuV3Tji7FsDO.jpg', 'https://www.youtube.com/embed/NMzJbD53ODc?rel=0&showinfo=0&wmode=opaque&html5=1', '878,28,12', 7.2, 'After finding a host body in investigative reporter Eddie Brock, the alien symbiote must face a new enemy, Carnage, the alter ego of serial killer Cletus Kasady.'),(31,'Red Notice', 'https://image.tmdb.org/t/p/w500/wdE6ewaKZHr62bLqCn7A2DiGShm.jpg', 'https://www.youtube.com/embed/Pj0wz7zu3Ms?rel=0&showinfo=0&wmode=opaque&html5=1', '28,35,80,53', 6.9, 'An Interpol-issued Red Notice is a global alert to hunt and capture the world\'s most wanted. But when a daring heist brings together the FBI\'s top profiler and two rival criminals, there\'s no telling what will happen.'),(32,'No Time to Die', 'https://image.tmdb.org/t/p/w500/iUgygt3fscRoKWCV1d0C7FbM9TP.jpg', 'https://www.youtube.com/embed/N_gD9-Oa0fg?rel=0&showinfo=0&wmode=opaque&html5=1', '12,28,53', 7.6, 'Bond has left active service and is enjoying a tranquil life in Jamaica. His peace is short-lived when his old friend Felix Leiter from the CIA turns up asking for help. The mission to rescue a kidnapped scientist turns out to be far more treacherous than expected, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.'),(33,'Free Guy', 'https://image.tmdb.org/t/p/w500/xmbU4JTUm8rsdtn7Y3Fcm30GpeT.jpg', 'https://www.youtube.com/embed/cttnRmcr_ME?rel=0&showinfo=0&wmode=opaque&html5=1', '35,28,12,878', 7.8, 'A bank teller called Guy realizes he is a background character in an open world video game called Free City that will soon go offline.'),(34,'Apex', 'https://image.tmdb.org/t/p/w500/chTkFGToW5bsyw3hgLAe4S5Gt3.jpg', 'https://www.youtube.com/embed/Pompk1znaIw?rel=0&showinfo=0&wmode=opaque&html5=1', '28,53,878', 5.7, 'Ex-cop Thomas Malone is serving a life sentence for a crime he didn’t commit. He is offered a chance at freedom if he can survive a deadly game of Apex, in which six hunters pay for the pleasure of hunting another human on a remote island. He accepts, and once he arrives, all hell breaks loose.'),(35,'Army of Thieves', 'https://image.tmdb.org/t/p/w500/iPTZGFmPs7HsXHYxiuxGolihjOH.jpg', 'https://www.youtube.com/embed/Ith2WetKXlg?rel=0&showinfo=0&wmode=opaque&html5=1', '28,80,53', 7, 'A mysterious woman recruits bank teller Ludwig Dieter to lead a group of aspiring thieves on a top-secret heist during the early stages of the zombie apocalypse.'),(36,'Spider-Man: Far From Home', 'https://image.tmdb.org/t/p/w500/4q2NNj4S5dG2RLF9CpXsej7yXl.jpg', 'https://www.youtube.com/embed/LFoz8ZJWmPs?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12,878', 7.5, 'Peter Parker and his friends go on a summer trip to Europe. However, they will hardly be able to rest - Peter will have to agree to help Nick Fury uncover the mystery of creatures that cause natural disasters and destruction throughout the continent.'),(37,'Wrath of Man', 'https://image.tmdb.org/t/p/w500/M7SUK85sKjaStg4TKhlAVyGlz3.jpg', 'https://www.youtube.com/embed/wo1kO8m2Nik?rel=0&showinfo=0&wmode=opaque&html5=1', '28,80,53', 7.8, 'A cold and mysterious new security guard for a Los Angeles cash truck company surprises his co-workers when he unleashes precision skills during a heist. The crew is left wondering who he is and where he came from. Soon, the marksman\'s ultimate motive becomes clear as he takes dramatic and irrevocable steps to settle a score.'),(38,'Snake Eyes: G.I. Joe Origins', 'https://image.tmdb.org/t/p/w500/uIXF0sQGXOxQhbaEaKOi2VYlIL0.jpg', 'https://www.youtube.com/embed/Vd2sm63Xwfw?rel=0&showinfo=0&wmode=opaque&html5=1', '28,12', 6.8, 'After saving the life of their heir apparent, tenacious loner Snake Eyes is welcomed into an ancient Japanese clan called the Arashikage where he is taught the ways of the ninja warrior. But, when secrets from his past are revealed, Snake Eyes\' honor and allegiance will be tested – even if that means losing the trust of those closest to him.'),(39,'Clifford the Big Red Dog', 'https://image.tmdb.org/t/p/w500/ygPTrycbMSFDc5zUpy4K5ZZtQSC.jpg', 'https://www.youtube.com/embed/PsE3aHTkQYk?rel=0&showinfo=0&wmode=opaque&html5=1', '16,35,10751', 7.6, 'As Emily struggles to fit in at home and at school, she discovers a small red puppy who is destined to become her best friend. When Clifford magically undergoes one heck of a growth spurt, becomes a gigantic dog and attracts the attention of a genetics company, Emily and her Uncle Casey have to fight the forces of greed as they go on the run across New York City. Along the way, Clifford affects the lives of everyone around him and teaches Emily and her uncle the true meaning of acceptance and unconditional love.'),(40,'Home Sweet Home Alone', 'https://image.tmdb.org/t/p/w500/fP3VvqUjEBjawxZHL4sYCq2ZdJD.jpg', 'https://www.youtube.com/embed/FOXW8ur2jr4?rel=0&showinfo=0&wmode=opaque&html5=1', '10751,35', 5.5, 'After being left at home by himself for the holidays, 10-year-old Max Mercer must work to defend his home from a married couple who tries to steal back a valuable heirloom.'),(41,'The Boss Baby: Family Business', 'https://image.tmdb.org/t/p/w500/uWStkK8bq9ixY3fc7y209ZleCoF.jpg', 'https://www.youtube.com/embed/-rF2j6K5FoM?rel=0&showinfo=0&wmode=opaque&html5=1', '16,35,12,10751', 7.7, 'The Templeton brothers — Tim and his Boss Baby little bro Ted — have become adults and drifted away from each other. But a new boss baby with a cutting-edge approach and a can-do attitude is about to bring them together again … and inspire a new family business.'),(42,'PAW Patrol: The Movie', 'https://image.tmdb.org/t/p/w500/ic0intvXZSfBlYPIvWXpU1ivUCO.jpg', 'https://www.youtube.com/embed/LRMTr2VZcr8?rel=0&showinfo=0&wmode=opaque&html5=1', '16,10751,12,35', 7.6, 'Ryder and the pups are called to Adventure City to stop Mayor Humdinger from turning the bustling metropolis into a state of chaos.'),(43,'The Addams Family 2', 'https://image.tmdb.org/t/p/w500/ld7YB9vBRp1GM1DT3KmFWSmtBPB.jpg', 'https://www.youtube.com/embed/946LiJiMQrQ?rel=0&showinfo=0&wmode=opaque&html5=1', '16,12,35,10751', 7.3, 'The Addams get tangled up in more wacky adventures and find themselves involved in hilarious run-ins with all sorts of unsuspecting characters.'),(44,'Space Jam: A New Legacy', 'https://image.tmdb.org/t/p/w500/5bFK5d3mVTAvBCXi5NPWH0tYjKl.jpg', 'https://www.youtube.com/embed/RCsEKvz2mxs?rel=0&showinfo=0&wmode=opaque&html5=1', '16,10751,35,878', 7.2, 'When LeBron and his young son Dom are trapped in a digital space by a rogue A.I., LeBron must get them home safe by leading Bugs, Lola Bunny and the whole gang of notoriously undisciplined Looney Tunes to victory over the A.I.\'s digitized champions on the court. It\'s Tunes versus Goons in the highest-stakes challenge of his life.'),(45,'Cruella', 'https://image.tmdb.org/t/p/w500/wToO8opxkGwKgSfJ1JK8tGvkG6U.jpg', 'https://www.youtube.com/embed/jpZrVxvG3mk?rel=0&showinfo=0&wmode=opaque&html5=1', '35,80', 8.2, 'In 1970s London amidst the punk rock revolution, a young grifter named Estella is determined to make a name for herself with her designs. She befriends a pair of young thieves who appreciate her appetite for mischief, and together they are able to build a life for themselves on the London streets. One day, Estella’s flair for fashion catches the eye of the Baroness von Hellman, a fashion legend who is devastatingly chic and terrifyingly haute. But their relationship sets in motion a course of events and revelations that will cause Estella to embrace her wicked side and become the raucous, fashionable and revenge-bent Cruella.'),(46,'Nobody Sleeps in the Woods Tonight 2', 'https://image.tmdb.org/t/p/w500/6QvepemlDGIiiYsVs0Y1ieFuG7N.jpg', 'https://www.youtube.com/embed/R_wIaGkiUBI?rel=0&showinfo=0&wmode=opaque&html5=1', '27,53,35', 4.1, 'When something horrible happens to the only survivor of a bloody massacre, an insecure rookie cop must overcome his fears to stop further carnage.'),(47,'Monster Family 2', 'https://image.tmdb.org/t/p/w500/em2NLSbVj49NjpdqmaKYuqKYZET.jpg', 'https://www.youtube.com/embed/46stXhjVF8Y?rel=0&showinfo=0&wmode=opaque&html5=1', '16,10751', 5.8, 'To free Baba Yaga and Renfield from the clutches of Monster Hunter Mila Starr, the Wishbone Family once more transforms into a Vampire, Frankenstein\'s Monster, a Mummy and a Werewolf. Aided and abetted by their three pet bats, our Monster Family zooms around the world again to save their friends, make new monstrous acquaintances and finally come to the realization that ‘Nobody’s Perfect’ – even those with flaws can find happiness.'),(48,'Sing 2', 'https://image.tmdb.org/t/p/w500/mC0zoSvnmGw4nFBGVfkeFp7lcAU.jpg', 'https://www.youtube.com/embed/EPZu5MA2uqI?rel=0&showinfo=0&wmode=opaque&html5=1', '16,35,10751,10402', 7.5, 'Buster and his new cast now have their sights set on debuting a new show at the Crystal Tower Theater in glamorous Redshore City. But with no connections, he and his singers must sneak into the Crystal Entertainment offices, run by the ruthless wolf mogul Jimmy Crystal, where the gang pitches the ridiculous idea of casting the lion rock legend Clay Calloway in their show. Buster must embark on a quest to find the now-isolated Clay and persuade him to return to the stage.'),(49,'8-Bit Christmas', 'https://image.tmdb.org/t/p/w500/wlh2wY2yC2SkwAdjcMRH4oiw04V.jpg', 'https://www.youtube.com/embed/CI-YWRK0VPo?rel=0&showinfo=0&wmode=opaque&html5=1', '10751,35', 6.5, 'In suburban Chicago during the late 1980s, ten-year-old Jake Doyle embarks on a herculean quest to get the latest and greatest video game system for Christmas.'),(50,'Raya and the Last Dragon', 'https://image.tmdb.org/t/p/w500/lPsD10PP4rgUGiGR4CCXA6iY0QQ.jpg', 'https://www.youtube.com/embed/3UFWsEY8Hdc?rel=0&showinfo=0&wmode=opaque&html5=1', '10751,14,16,28,12', 8.1, 'Long ago, in the fantasy world of Kumandra, humans and dragons lived together in harmony. But when an evil force threatened the land, the dragons sacrificed themselves to save humanity. Now, 500 years later, that same evil has returned and it’s up to a lone warrior, Raya, to track down the legendary last dragon to restore the fractured land and its divided people.');



