<?php



$phone[1] = "+7 (467) 392-1713";
$phone[2] = "+48 (923) 672-7264";
$phone[3] = "+48 (308) 567-4658";
$phone[4] = "+1 (317) 850-2252";
$phone[5] = "+7 (593) 871-1553";
$phone[6] = "+7 (562) 559-2458";
$phone[7] = "+234 (368) 632-2758";
$phone[8] = "+63 (417) 775-2278";
$phone[9] = "+386 (881) 443-5400";
$phone[10] = "+359 (195) 464-6023";
$phone[11] = "+880 (892) 760-0320";
$phone[12] = "+63 (603) 111-0039";
$phone[13] = "+46 (906) 937-1332";
$phone[14] = "+86 (104) 288-8962";
$phone[15] = "+7 (374) 361-1733";
$phone[16] = "+235 (861) 360-0597";
$phone[17] = "+242 (502) 681-2881";
$phone[18] = "+86 (861) 524-6787";
$phone[19] = "+66 (378) 979-7623";
$phone[20] = "+86 (323) 628-5150";


$_GLOBAL['phone'] = $phone;


$company[1] = "Bernhard Group";
$company[2] = "Metz LLC";
$company[3] = "Stehr LLC";
$company[4] = "Bayer Group";
$company[5] = "Littel Group";
$company[6] = "Schuster LLC";
$company[7] = "Luettgen Ltd.";
$company[8] = "Beahan ltd";
$company[9] = "Zulauf Funk Ltd";
$company[10] = "Howe and Quitzon";
$company[11] = "Crona & Goldner";

$userBadge = [
  '<span class="badge bg-accent2">New</span>',
  '<span class="badge bg-accent1">Review</span>',
  '<span class="badge bg-warning">Inactive</span>',
  '<span class="badge bg-accent3">Active</span>',
];

$_GLOBAL['userBadge'] = $userBadge;


$status = [
  'online',
  'offline',
  'away',
  'blocked',
];

$_GLOBAL['status'] = $status;


$time = [
  '1m',
  '2m',
  '10m',
  '30m',
  '1h',
  '2h',
  '5h',
  '1d',
  '2d',
  '3d',
];

$_GLOBAL['time'] = $time;


$timeampm = [
  '08:00 am',
  '08:30 am',
  '08:40 am',
  '09:17 am',
  '10:03 am',
  '11:20 am',
  '01:00 pm',
  '01:20 pm',
  '02:05 pm',
  '02:30 pm',
  '03:21 pm',
  '03:43 pm',
  '04:21 pm',
  '05:10 pm',
];

$_GLOBAL['timeampm'] = $timeampm;


$locations = [
  "1" => "New York",
  "2" => "London",
  "3" => "Mumbai",
  "4" => "Paris",
  "5" => "Bangalore",
  "6" => "Moscow",
  "7" => "Dubai",
  "8" => "Tokyo",
  "9" => "Singapore",
  "10" => "Los Angeles",
  "11" => "Amsterdam",
  "12" => "Barcelona",
  "13" => "Beijing",
  "14" => "Beirut",
  "15" => "Bergen",
  "16" => "Cape Town",
  "17" => "Florence",
  "18" => "Bruges",
  "19" => "Jaipur",
  "20" => "Queenstown",
  "21" => "Budapest",
  "22" => "Rome",
  "23" => "Venice",
  "24" => "Seville",
  "25" => "Sydney"
];
$_GLOBAL['locations'] = $locations;

$countries = [
  "1" => "USA",
  "2" => "UK",
  "3" => "India",
  "4" => "France",
  "5" => "India",
  "6" => "Russia",
  "7" => "UAE",
  "8" => "Japan",
  "9" => "Singapore",
  "10" => "USA",
  "11" => "Netherlands",
  "12" => "Spain",
  "13" => "China",
  "14" => "Lebanon",
  "15" => "Norway",
  "16" => "South Africa",
  "17" => "Italy",
  "18" => "Belgium",
  "19" => "India",
  "20" => "New Zealand",
  "21" => "Hungary",
  "22" => "Italy",
  "23" => "Italy",
  "24" => "Spain",
  "25" => "Australia"
];
$_GLOBAL['countries'] = $countries;

// $name[1] = "Clarine Vassar";
// $name[2] = "Brooks Latshaw";
// $name[3] = "Clementina Brodeur";
// $name[4] = "Carri Busey";
// $name[5] = "Melissa Dock";
// $name[6] = "Verdell Rea";
// $name[7] = "Linette Lheureux";
// $name[8] = "Araceli Boatright";
// $name[9] = "Clay Peskin";
// $name[10] = "Loni Tindall";
// $name[11] = "Tanisha Kimbro";
// $name[12] = "Jovita Tisdale";
// $name[13] = "Collen Kirby";

// $_GLOBAL['name'] = $name;

$names = [
  "1" => "Hatti Key",
  "2" => "Barton Meggi",
  "3" => "Juliet Wykes",
  "4" => "Gisela Smohit",
  "5" => "Clara Stears",
  "6" => "Dag Curner",
  "7" => "Wyatt Dobbson",
  "8" => "Stark Winter",
  "9" => "Grove Stark",
  "10" => "Gabi Cuchey",
  "11" => "Derwin Climar",
  "12" => "Daisey Brett",
  "13" => "Ewan Belchem",
  "14" => "Royal Rans",
  "15" => "Humbert Dom",
  "16" => "Nico Keasley",
  "17" => "Clyde Shep",
  "18" => "Obed Enever",
  "19" => "Rowney Jill",
  "20" => "Emmi Derill",
  "21" => "Mirelle Fair",
  "22" => "Clara Stark"
];
$_GLOBAL['names'] = $names;

$lines = [
  "1" => "Full time manager and rockin it!",
  "2" => "I tend to be the peacemaker between friends",
  "3" => "Work out? Are you serious right now?",
  "4" => "My friends encouraged me to do so, so i persue",
  "5" => "Yes - I am halfway through it already!",
  "6" => "Yes, but I only have a couple of items on it",
  "7" => "Let me help you with your baggage.",
  "8" => "Sixty-Four comes asking for bread.",
  "9" => "The shooter says goodbye to his love.",
  "10" => "Please wait outside of the house.",
  "11" => "The sky is clear, the stars are twinkling.",
  "12" => "She borrowed the book from him many years ago",
  "13" => "She works two jobs to make ends meet",
  "14" => "Tom got a small piece of pie.",
  "15" => "Writing a list of random sentences is hard",
  "16" => "Abstraction is often one floor above you.",
  "17" => "The mysterious diary records the voice.",
  "18" => "She was too short to see over the fence.",
  "19" => "The waves were crashing on the shore sight.",
  "20" => "Everyone was busy, so I went alone.",
  "21" => "The lake is a long way from here."
];
$_GLOBAL['lines'] = $lines;

$sentences = [
  "1" => "Someone who is not witty or sharp, but rather, they are ignorant, unintelligent, or senseless.",
  "2" => "To greatly frustrate someone. To drive someone crazy, insane, bonkers, or bananas.",
  "3" => "A person who does not speak a great deal, someone who talks with as few words as possible.",
  "4" => "Someone who is beating around the bush is someone who avoids the main point.",
  "5" => "Its useless to worry about things that already happened and cannot be changed.",
  "6" => "Something that occurs too early before preparations are ready. Starting too soon.",
  "7" => "Typically said to indicate that any further investigation into a situation may lead to harm.",
  "8" => "Getting sincere about something, applying oneself seriously to a job.",
  "9" => "To greatly frustrate someone. To drive someone crazy, insane, bonkers, or bananas.",
  "10" => "Someone I know recently combined Maple Syrup & buttered Popcorn thinking it would taste.",
  "11" => "There was no ice cream in the freezer, nor did they have money to go to the store.",
  "12" => "What was the person thinking when they discovered cow’s milk was fine for human consumption",
  "13" => "She works two jobs to make ends meet, at least, that was her reason for not having time to join us.",
  "14" => "Last Friday in three week time I saw a spotted striped blue worm shake hands.",
  "15" => "Wednesday is hump day, but has anyone asked the camel if he’s happy about it?",
  "16" => "Italy is my favorite country, in fact, I plan to spend two weeks there next year.",
  "17" => "Sometimes, all you need to do is completely make an ass of yourself and laugh it off",
  "18" => "If Purple People Eaters are real… where do they find purple people to eat?",
  "19" => "My Mum tries to be cool by saying that she likes all the same things that I do.",
  "20" => "Malls are great places to shop, I can find everything I need under one roof.",
  "21" => "Joe made the perfect and delicious sugar cookies, Susan decorated them."
];
$_GLOBAL['sentences'] = $sentences;

$paragraphs = [
  "1" => "Design philosophies are usually for determining design goals. A design goal may range from solving the least significant individual problem of the smallest element, to the most holistic influential utopian goals.",
  "2" => "It may involve considerable research, thought, modeling, interactive adjustment, and re-design. Meanwhile, diverse kinds of objects may be designed, including clothing, graphical user interfaces, products, skyscrapers, corporate identities, business processes, and even methods or processes of designing.",
  "3" => "Another definition of design is planning to manufacture an object, system, component or structure. Thus the word design can be used as a noun or a verb. In a broader sense, design is an applied art and engineering that integrates with technology.",
  "4" => "She looked at her student wondering if she could ever get through. You need to learn to think for yourself, she wanted to tell him. Your friends are holding you back and bringing you down. But she didnt because she knew his friends were all that he had and even if that meant a life of misery, he would never give them up.",
  "5" => "Sometimes there is not a good answer. No matter how you try to rationalize the outcome, it does not make sense. And instead of an answer, you are simply left with a question. Why? And instead of an answer, you are simply left with a question. Why?",
  "6" => "Then came the night of the first falling star. It was seen early in the morning, rushing over Winchester eastward, a line of flame high in the atmosphere. Hundreds must have seen it and taken it for an ordinary falling star. It seemed that it fell to earth about one hundred miles east of him.",
  "7" => "It was difficult to explain to them how the diagnosis of certain death had actually given him life. While everyone around him was in tears and upset, he actually felt more at ease. The doctor said it would be less than a year. That gave him a year to live, something he had failed to do with his daily drudgery of a routine that had passed as life until then.",
  "8" => "One dollar and eighty-seven cents. That was all. And sixty cents of it was in pennies. Pennies saved one and two at a time by bulldozing the grocer and the vegetable man and the butcher until one’s cheeks burned with the silent imputation of parsimony that such close dealing implied. One dollar and eighty-seven cents. And the next day would be Christmas...",
  "9" => "Here is the thing. She does not have anything to prove, but she is going to anyway. That is just her character. She knows she doesnt have to, but she still will just to show you that she can. Doubt her more and she will prove she can again. We all already know this and you will too.",
  "10" => "Cake or pie? I can tell a lot about you by which one you pick. It may seem silly, but cake people and pie people are really different. I know which one I hope you are, but thats not for me to decide. So, what is it? Cake or pie? she will prove she can again. We all already know this and you will too."
];
$_GLOBAL['paragraphs'] = $paragraphs;

$professions = [
  "1" => "CEO",
  "2" => "Web Developer",
  "3" => "Web Designer",
  "4" => "Graphic Designer",
  "5" => "Designer",
  "6" => "Business Analyst",
  "7" => "Programmer",
  "8" => "Tutor",
  "9" => "Videographer",
  "10" => "Photographer",
  "11" => "Team Lead",
  "12" => "Project Manager",
  "13" => "Senior Designer",
  "14" => "UX Designer",
  "15" => "Stock Broker",
  "16" => "Manager",
  "17" => "Vlogger",
  "18" => "Enterpreneur",
  "19" => "Blogger",
  "20" => "Civil Engineer",
  "21" => "Software Developer"
];
$_GLOBAL['professions'] = $professions;

$headlines = [
  "1" => "Modern Design trends for you",
  "2" => "Being Creative with your design",
  "3" => "Managing UI and UX development",
  "4" => "Learn Designing with these tutorials",
  "5" => "Make the best of your creativity",
  "6" => "New graphical trends in market",
  "7" => "Web designing at its very best",
  "8" => "Build your functional website in 2 days",
  "9" => "Dynamic website building ideas",
  "10" => "Making best use of your creativity",
  "11" => "Boost your project development today",
  "12" => "How to move with your career",
  "13" => "Making the best of your time",
  "14" => "Keeping your activities on track",
  "15" => "Build a Successful project with ease",
  "16" => "Simple steps to web designing success",
  "17" => "Make the best of your website campaign",
  "18" => "Bringing positive outlook of your project",
  "19" => "Tuning proper development techniques",
  "20" => "Making the best of your time today",
  "21" => "Simple steps to programming success"
];
$_GLOBAL['headlines'] = $headlines;

$titles = [
  "1" => "Fashion industry and its trends",
  "2" => "Stylish looking and modern looks",
  "3" => "Beautiful art and its creations",
  "4" => "Making the best of latest fashion",
  "5" => "Models posing to the latest trends",
  "6" => "Making the best of your style",
  "7" => "Looking stylish all the times",
  "8" => "Gorgeous and appealing fashion style",
  "9" => "Look gorgeous with modern fashion",
  "10" => "Amazing clothes and props of today",
  "11" => "Latest fashion developments near you",
  "12" => "Being fabulous is the current need",
  "13" => "Not just any fashion for you today",
  "14" => "Creating wonderful cloth combinations",
  "15" => "Making Up for the best of your looks",
  "16" => "Elegant and stylish looking trends",
  "17" => "Super fabulous feel at work now",
  "18" => "Making your fashion superior today",
  "19" => "Wonderful looking trends for you",
  "20" => "Your daily style and trendy needs",
  "21" => "Making the best of your fashion"
];
$_GLOBAL['titles'] = $titles;

$groups = [
  "1" => "Films",
  "2" => "Techonology",
  "3" => "Electronics",
  "4" => "Finance",
  "5" => "News",
  "6" => "Fashion",
  "7" => "Trekking",
  "8" => "Travelling",
  "9" => "Networking",
  "10" => "Programming",
  "11" => "Music"
];
$_GLOBAL['groups'] = $groups;

$questions = [
  "1" => "Where can I find information on new features?",
  "2" => "Do I need to be online to access my desktop apps?",
  "3" => "When does my membership begin?",
  "4" => "What happens to my benefits if I decide to stop my membership?",
  "5" => "What if I have problems downloading?",
  "6" => "Where can I find the terms and conditions?",
  "7" => "Where can I get more information on managing my account?",
  "8" => "Can I choose not to share information?",
  "9" => "What information is shared and how does app use it?",
  "10" => "What type of personalization is provided?",
  "11" => "What types of files can I store in app?",
  "12" => "Can I share any kind of file from app?",
  "13" => "What happens to my files if I cancel or downgrade my membership?",
  "14" => "Am I required to store my files in the cloud?",
  "15" => "How to delete my files from cloud?",
  "16" => "How to download my files from cloud?"
];
$_GLOBAL['questions'] = $questions;

$faqCategories = [
  "1" => "Account",
  "2" => "Security",
  "3" => "Privacy",
  "4" => "Usage"
];
$_GLOBAL['faqCategories'] = $faqCategories;

$days = [
  "1" => "Mon",
  "2" => "Tue",
  "3" => "Wed",
  "4" => "Thu",
  "5" => "Fri",
  "6" => "Sat",
  "7" => "Sun"
];
$_GLOBAL['days'] = $days;

$months = [
  "1" => "January",
  "2" => "February",
  "3" => "March",
  "4" => "April",
  "5" => "May",
  "6" => "June",
  "7" => "July",
  "8" => "August",
  "9" => "September",
  "10" => "October",
  "11" => "November",
  "12" => "December"
];
$_GLOBAL['months'] = $months;

$notifications = [
  "1" => "New Message for You",
  "2" => "Reminder for appointment",
  "3" => "Appointment booked",
  "4" => "Message Sent",
  "5" => "Session initiated",
  "6" => "Your connection is online",
  "7" => "Account password changed",
  "8" => "Account verification",
  "9" => "Missed call from connection",
  "10" => "Your account is upgraded"
];
$_GLOBAL['notifications'] = $notifications;



$project_names = [
  "1" => "Ecommerce Website",
  "2" => "Social Media app",
  "3" => "Chatting App",
  "4" => "Backend Dashboard",
  "5" => "REST Api integrate",
  "6" => "Mobile App Design",
  "7" => "Firebase Setup",
  "8" => "Admin Dashboard",
  "9" => "Social Website",
  "10" => "Backend Server"
];
$_GLOBAL['project_names'] = $project_names;



$project_categories = [
  "1" => "Web Design",
  "2" => "Flutter App",
  "3" => "Mobile App",
  "4" => "React Native App",
  "5" => "Angular Dashboard",
  "6" => "Graphic Design",
  "7" => "Database Setup",
  "8" => "Vuejs app",
  "9" => "React Js App",
  "10" => "Dashboard Panel"
];
$_GLOBAL['project_categories'] = $project_categories;

?>





