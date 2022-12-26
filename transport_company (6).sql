-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Дек 26 2022 г., 03:08
-- Версия сервера: 8.0.24
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `transport_company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id_access` int NOT NULL,
  `log` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id_access`, `log`, `pass`, `access`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'user', 'user1', 'user'),
(3, 'guest', 'guest1', 'guest'),
(5, 'nikita', 'nikita1', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id_client` int NOT NULL,
  `FIO_client` varchar(20) NOT NULL,
  `passport_num` int NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_client`, `FIO_client`, `passport_num`, `birth_date`) VALUES
(1, 'Горбов А.К.', 312626, '1991-06-05'),
(2, 'Патракеев Н.И.', 784353, '1995-04-10');

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int NOT NULL,
  `FIO` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `starting_date` date DEFAULT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id_driver`, `FIO`, `starting_date`, `salary`) VALUES
(1, 'Иванов К.КК.', '2021-08-12', 34000),
(2, 'Алиев Н.В.', '2020-07-15', 45000),
(3, 'Коробов К.И.', '2018-04-12', 37000),
(4, 'Голованов И.И.', '2013-10-01', 60000),
(5, 'Кавелин А.П.', '2022-11-30', 35888),
(6, 'Мустафин Н.Н.', '2022-02-10', 25000),
(7, 'Милютин Е.П.', '2022-10-06', 27000);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id_im` int NOT NULL,
  `description` varchar(50) NOT NULL,
  `bin_data` longblob NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filesize` varchar(50) NOT NULL,
  `filetype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id_im`, `description`, `bin_data`, `filename`, `filesize`, `filetype`) VALUES
(1, 'текстовый файл', 0x66696c65, 'file.txt', '4', 'text/plain'),
(2, 'про май', 0xd09bd18ed0b1d0bbd18e20d0b3d180d0bed0b7d18320d0b220d0bdd0b0d187d0b0d0bbd0b520d0bcd0b0d18f2e, 'file.txt', '45', 'text/plain'),
(3, '', 0x89504e470d0a1a0a0000000d49484452000000e1000000e10803000000096d224800000168504c5445fffffff72d1d010101000000fefefed0d0d0f72d1ff92c1dfffffd020300fcfffe000003f62d1f010304040202fffdffc8c8c8acacac808080fb2d19d4d4d43131316f6f6ff8f8f8d9d9d9f2f2f2b7b7b73434349494940b0000f83126f72e185f5f5fa0a0a0454545767676525252e2e2e2ebebeb666666ee1a00fff9f51400008989894242421b1b1b2a2a2aa7a7a71515159a2820f8ded9ffededf337272a0d0878221bda1700eb362cad2d2983251f380a0cc8322b21000076656acaafaafffff2da615c541810e47562d94c406b1818b92b24d45b4bfce9dff6d1c9db3828dd3332efc1bd420f0eefb6aedf24143a1418571f20d8332265201af1cbbe952821821e1a6f1713bc3620a835317e2c2a682721d96a63e48278e79596efaaa9312020e73335d13132410b15b93036922a2dedb5a4e75c59e99388c02d2fdf847bb03022fbdddfe46a6535111ae8a49661171c490b0e4d1d13cf726b172724d5a093cd3822e54545161bc2530000180649444154789ced9d8d57dbc6b2c025afd0da92fc4144ca47409b0f20b29b900032c860de251428d810375093264dda0bb71f49935792f65dfaefbf995ddbc8065b926da5718fe79c9e1e13599e9f667767767676258d8efcb365541a93fed932268d48ca3f59804f10fedd4f3a3a19120ebe70c2bf5b89084519120ebc0c09075f8684832f43c2c19721e1e0cb9070f0654838f832241c7c19120ebe0c09075f8684832f43c2c197e808bbb96714a9f7a10dbbbcab228d3dca8c875545c93cc235943eeb120da1748f1072733edc97266fc197bee8b32a51b5d25182321bee4bf7492c46c8a33eab1211e16dc2b50d75df717c283172b7cfaa44491823d341bb22743e655a7c67400847b93908799809fa8d9187840c522b95be007d6f656609f9328867542430e06ce6017ce95ebf35898810bcc56806eefa080647ffe19f0fbd77e0ff99d1fe57be4445a8889b4b6381ac7283904c2da0e97b5413594c530fc0e60899f6bbf60e2163f59a9efe2b1279d49641f53b6a000f614a8aac1ee413c4a55f92854ef757945be486001c54426901da6907edef909b35c081251c2164b2fd4f4ca660941970428870be6cff13d310be46f9fb9f80509126d088edfe9590687fff53d85001238ec2e46862eace8dfbb3771fdcbd3b7bfbdef468661ea3d651084423adaafb3473fc0cb975ef16b9220f6f4f8fcc82a71878c2cc8d8744cc8c629722227394a9c90822994b899610ee3b3fbdc0e9da0a46db131132466cc3f91bc24eed0105e3ec4877c9b9001229e1f8975eb856d2cbcf3ce33121a507ce1f4e3dbc440286e4dd5b5e44421e5c7ec64e391d8d161112de6b321999ce3ccacccd5e227f099fe767bd267e3017851a9111f2d4a047fd3b30c78008fb41bd614e432c47ee83a7f45a75a4ff7a444638bfd0dce716a49bd812e7c7043621d25dcccacccf3577d4a9be2b1215e1e4e39651e59ef490138e3f1484f79190903965c1db5571aadf6f898450197fd0e22080708aa799ea845fe0cc98dc966072d83cbe4ef45d99486c78a3d501925b30899a9e4a6310ce3f2725696c7a5491e65b3dc8c2f820108e5c71f18d1e76bff64f108a73b9d77a294eb4faaa4e04840a0e2aad2210271bc625040c288ddfb8e659f4d9674461c391eb8234426edebf9df40e9c0bf76f3fbe269ec3a44d3f250ac27bd713b604a8ede25570249f7d2b7ddc39d0f6917efbfd7e132a4a7db8ec1ed137831c4ea3bedbf091df64c9df88b7fb39d8f49b70e2568f7c1cb19ff38c3e12a21b9bee9d4f303e98e8874a5cadfe11a6a5c9bbfd01e4661c95e2a0563cfeb9102a8a8691677ff804e2ed49a967bcfe112a694983169a02e91fe3425f069c7e112ad2ffe0180a847a2ad12b5c0ad31a49b8dfbf36fba05a3f0895b4b2fcc42d6ccd904402097b45843b00defacb22fb2aab68da674028494bdb26559de2e23a669c92c9de00894ec8c6ceae6b98a6fdf51edcbda7eed80f4245da2f19cc906566bac5b57c537e3b9c39890857535b85b2430d95aa262b2df598f4ef03a1a61dac8236b22cab32a53258726b03f54cc67418770221c275d081751dbf76b85238b51863b26cc8785b7b3fdd5322b51f367c5aa1aa0a6cb26a18c86818a5ddaaa0d4f5204d162ee17040b758740dcb600c1f183082c8eec1df4d7850312955511f151ebbacaaa0a1499da38bc2cb6feaab4cb16412595b6893d8656b57e49fadbd2bb98e6a5203dba72044444a2b07bda8d723a1928e3fb52945c3c9cd4219550dcb3d7af7f3cb0f87f91c217a8d55afb5c69a6cac1f1eaf158a8e631932364df1b0bc375255fbdbb8d6755fecd586dab7152a8ba6d9a219a7946104b280b35c7c5758ac9e9c3c7ffe7ce718e4f9f3939393ea8bc27717a592e3c013c2062ebe53375fe3936aa895fdee5d464f84f0b57d97c935c2562b427b05710ca1a8896666c6f68b97df7ffffd8b53c70251f1af2ab469e87ad7125241081d7ba96b2bf446985ec641e68aed9a30ebff47839656ea8df3b8e858c862c8a669a20d3bdd4595cda3bd789766ec89309e7d625ce937ed8431ab9027c22be0f8f2c211d6a25c3a7fd734d9ab6c97d38c2e0915fe40d3af4d7fed1a62bd2010d5256280984824755235827e139e8269ff20f1e9549484de821141f8a3cd6435a89ae62e49ea1003202472c648c16281196575f5408329685b8d7a275466c917de0a3c4d539656cdc00acad4fd088e22c909515229b2ee067e3cd0028cd2b272d95041e3892fc86c10c5831266f8527463694819d7d24f6c39682704c202414fe8214c90452b7013570dd9fed3eb13b1fe3850e23130e1382fa9200b53e2dab4b2f9c696af7a88366250eb1946704952cf0d63773c7402f662f03acc60abe7751ba6a76ada04a8940fde0fc7476ff11a989ba30a5caf284b1553be12c9b415d39d41404f5a1f1053a5c084e04a193b5ae6e57dcae84daec983d1006a871b4b3377c593e3e5f44fcc10bd50a62598143513c6927a91ca019b29f606ca5ec158a33c12f54777032ea686f41613f7451bbb33fed4169a073302554b24d662c3588aec06fa6eed2700d2fe76fc9150e07ee092f77084620443f9f759fdd70321527a44eafdd043580c0648598d906eff9bfffa171352e0ea9b9084389acd21e389257edc80498185931db5f3c84f5da2275a0875bde4fb74a86c398ed3e8eece73e49b0b5370db554c337f63a30c51a6613a672b7fe4f38727650727751d35b5fe20ad84e0107de864f9f405fc40fe7b98f64300aeaae659eec67cb8b446378470f51b9cccd3f20e9fc6c3746fe594fa798ec5ab84559faf984e214f4411e37f7e82e90740d273fcf9a809352d5b610078b44e12e8c391f1e391d17992414b79924c24bc4ba4b952e7d198ba6b3c4ad06310a9a7160dec09b41457c245e05d1162400a165cc7a1037e9e87601f5c3fe701418d27238e7169675741e52ac1441610c6209225ef0cecf9f65329dc34aa0bc2787c799ba9cc59c1cc28fc3c0fc152a4eae3da0ca70a26bf1c66c88a2b77188761fc2c83056ba93af80d7d037a024cc2becea6fd75ec8d50891f40402a976740ddc42561de676084c0ad9ae379d4148fdcd65c59eef45098b1421ad9738c64c9a20c03385ddd0fa96e1784d9af18a8fb33e18942ae2ece6bc94f7ef10955cf70684ae08ac456d1609d3d293bfd1d0879378c895cf133070354e375d463298f4855d5da217c9627ba1612fa35534c373ac5eacebafeac5a7498a97626348b3832d5091132ef9a309cd2d25ea8c45b1784d2b94d81700bfa482ad5584fd3f5153f4215334f86b3465e98e04c2d3fc277cd84a9188cbdaaa19af62fd17a0b45899760b2469110e9eaa36392ac187ea3290f9f8d3552c5241ca67d3b31d25d9d1336c6de64ae8c979be6af525a0bae7178426d6fd50242798d242ed743b1952e069b26182fc909cf33aa3ca66efb255aca35f9cf0439743134a5462554330d4da869e7d01740b3779c9033ea9cf082064a2d01e19aca73a9b57c683b710ef5549d10fb3c59b1f8f75570899112c67fc5c6a852f790e0d25222c67313e8f2834d33ac63b2c2a31f1102b5fd8a0121c2e57232b4575234194f3d9bafa21d6996dddaba5081f0844b8c67d0c8ccdb805345eb1939361a849dbe03cfd03311211f2c2484f8d73ccd86086bc2131eacd626a4d61a47e44b2dd00b5d23d84c112619c701921f80c28a394f2de3fa2978612454e9eafb2809b5374ca800f3a513be0e3a932064a66af959a42ed63a7966057814f813c5431e3341744a3e9c3131dd86599afd6388e03bbc0d9fb0fa5a04b5768ff94259eeb868d41ebcafd7a7565e3f0c46a81ad6516dd1fc109a487da14695cdd721f40d4db85c66f56912f834f76cb750d8bd704dabb6c4e46b45ea6ce8df0425349851821f28144bcc94eb845436b7b31112be5fbd54968aa56d88542eb9fc09737ade0245e540c964832fc035dd143e5796222354a403db3b4c88b8c433c604b0e18c20f45995ab89595f9ff2fe51b5f7837bc4d084ffb59b3433820d2f1e4297e81b96a8dc68fcadd317ae197769189f1fba95be0a9407862e2a331e9899549599475fa34474e27afec220d2c411929a2cf05294fd262ac2785cfad50ca406f892f2ee62b55a2d9cb926bb04328c32cc82bd8426737f5aacae550ba5c0eb8986fd2a32424d2ab76d94ded64bcd526d9c27b9ef8b5633a14e4ecd46db534b27ebbcf2067c4ec1b9a6a8e33a42f66b6484ca6645f56fa6945a2fb0be84270140fb9d53b96e79835e004c89d6384ca7a0133185e717821d03ac6719ac04cd29e0aa77581beead06180255f78460928acfed527a921c9eaa0dc22210966b84984ec3cb12a2384c2787673480173168251e25a1cf330605ad13c27380a43e79241f4f1bb1de771e1baa0098e4abde8210d785030ccdaa59c96ad1106ad292ed1398198661c1ac23a99344a2910a4c9297562d5ec7b560f29d89fe905a6f79dd34bf501757921dd77f2d83527b4f0b1a9a7641e85b1ae2e609cc38b8e2b51c4022996b2c337142eef1a9fb91e82253d8481926c85b7f1b72c268469a20840cac84ab9f228f5a9fdde9c78658f38769651208b144c87c47f4589db0869ad0779c000b52ab4b1111c6a5f7b66f58e63e1379ce98e7940868b46ecd435481b0c009ad1d222ef32ed72466fc97dcc0e52f69e94856d790d02f9ec425981aa147ef14298a75ce1a21dec45d272d97f15129403335ec25259a15d2208472910050b3de78a2c0220fde4cba86843820d3f28c7e1d61d5d75d186043291d700d2a2ce1922fa1090eef0a212e16721b52750508ab9cb0c49d660ba18e99381f616c75594aa7fb45d8dcdcf76c3f8f6ca20d13ad3b1280cae4840612ae6100d08ef0240861f029b02fa1f8a7f1f9b98989b1914ce65fb25fd0c1095b779540e32bf0ea14d5e284981ea7a599e495568a8fc23fa86195a94c66646c6c626edeb766c8df86a30bc42bbe3107730f49d35a6f8db064e24a856a1d833f5c41ffcfdde115c218d9f5f716ecc2ab526ca1d3510cfe84b5bbd42bce2f7c09ad952b84895432ef9a2a27dcd275b2c3231c08eeae12eaf900410ddb25cd6a75986af811e2d673cfd37abcf09d5fb11e53df92461856274c929f79213038c12d88c48557a76f212a6de6835868cd7f6ec15861e1f1638f5eb77a20842e98c9407b9fac1f75f09be99728a3c2933719475f3fe28406ae4624c996a0705648d35eb7949e20f9721077785e576e726e622cd3f1d4e950de021fd4b9edab002de75b9a5f92bc93396033215ca8375749a5f042df1f90eda7e02c78115f00a583107aeb8fbeb57d67c094bdcd1124ac59520767e8989c50054218693ef27e087f28e6eaeb9f29f124568c00591266ef4be9cbb7e1f681d02bef2bfe737c6681e6e0f6b1544f4fe2d2e2650ac645b31dd64613aa16d70949f2453a748d64cd0d5228c7dcbde00a87cf799f0578c6a67a860568dcef13b2b5eb5c6a7d8a84ebf5e21b6694573670f1836fa8fc5874d4207973f3d7cd0809a5ff0d40c864ea14d7788669e3f8adcb3c6517a50df0160d428351a3b8f23bcf583d2bb8d40854ce69be8e7265463bb72d4f76b0bd50eab8a552c931546fce9a5e60b8bde1a9f7a2d470b9189755963e62ff12c222e109f7577d35109a37d2d5de86472f525708eb223efbe7dae86a88658b2e08b3a766b0027603774836106a7fa345dc75d142287be72b7e375755f3af6c88bd25a109e3d22b3b7089fe55a1b8af24498a616ac49b6f6058f66ff1282b15e2d2537f9fdf9110d7c4bb27041bdb074a88e2bd2eaa4d96ed20034d7b42d21b214c9db2610adbc27b0b0dd7b9bb9777dc86bbddb75295bd9602274bbb2254a45f58f7fd502d08c2506b8e4dc2ec6f83a6bbbb2494a4bda3ee8d48850ddf7567431c92eda61d5e51102a8af6fa9ae818eb5f7089d3ec9cf5a78b9cb0d08950aded7856ad2b6b244878ae455dabaf80d3bf0201fa381097e066b48ee6a155f48764b1c345aa61327e33e7ba7d47b4b2a7a5d3518ea520dae6d766eb9672eb6cede3fafafacedbd3ce3d8ce2725ab2731da36115d73ee6f3871f0a0ebbb2c8cfbe8ac7a327d40e5a72fb4609cb9b313d437e3f739c4edaf30d061d09a9b819cafa4f2d3b14a9bcfa1e01a3258c6be9f85fcdbbe6619697e48b2c58015675e4f6e515c60a27acb6c533e5621e6e8653c6442a417e6aee89ccfc153a61e484f134c4359708066e2dd131ef256a154941666dabf82c41d83eebab960e49821f569448e03935bb4d051aa67d2029d1db10a2c2ecb6a70acad9a9a765447e2f57666db7bf8a6bc94a3b8f5a4f63615283f01456d95b986b3e09e50bbb24e4df3ab89c4399a59c37b5866b2b563b1be2d3c044f7f376093b7a968b35ee96122970cfc3acec6b9f8830bdf9e47224af36250f132972e89a6df2498230a9ef586d6cac567185dcf3bcc8bad3f82566be52421f01d2e58903e9f4d26abddccbfd409ad2bf2968a6eddc1dd64e632b3d6e47687d44426f8a98942f012bcb6934612833764b98dd7c531b0270f9a125330f5387360048988ce964abdd52b695d75b56e648a93e3053f90db451d435eab85442a7af654b626e4e9bcab1eb841d6c8817b427dcd013570851f81ed94d6d93b37d02427894e9a7d04eb170d6396e22047f912bb50104c20d6c82583673fd05c61fa489304588cb4f2e3254eaee6bb598fb1310f2d385fe34c41ac6490b218c346d9d81bb9144b5bf6947a89e90196f339d2179879717a9a6f5a7548fb93f09219e7379c6d0719b67d0b5125ec29336bb9e61da719ae3846d97d068b1e924de5882acc9628b317b4ba6a5f0ddb05b4245526e43d878c4abaf6130f5ac6a2712b952dbac2ebd10d7e4da959450778734f652a592a9c4c619e547e030089cc8ec785c097b844bb7369cc363f2ffef1cc30dc32ae7f4cba60561b5d39eb088164ab62794e58b3cb4d3dab26232490a164f45d2ca7f1720345c980b7dde679784fca493bb93f1df6c2c8155dfcee076cbda3b014e3a9ce721d2a57a87b22066bc238daea8939f1d83dfcdfe213ec9cfac980a7bc66077bbd5a7f1b7f0dd8d0a9e8e6140acb5c5cb49f1c0c3022e67b72b49c1dacbce84b8d3744bccc474b2f1c2e225ef267b851542f8ca133c4739ea5db2d2243f1c630ac7356d6f1b7928750a3beb3333b9adc5b2c1da1352b4211831418a1d2688a65b385e9fd1731fab654b6c7233bfce2a78b620be7d80dc1e0fc5d805e13c16673ce6e7fc2a4a7ce98257ac3366b8474747ae6af2ad49ed4c88296fbe50d889d0a0a673747151722984b748686eefc591302d4de0eafdcdf96809c56143f557c5c595f71706ee79ad6f096ddf4291502ef043f73adbb0b15a83136206ff1597158cb8354d93c6f9d14299101b104313f27719dfa8974a29714d5a2a53516721aa2bd58e45c4823019a43c4fb032061684485fab89c4dfaf14e8ec9dee08a7c4fd1b8f10c6eecdfdb2cd587d134c471b1ab4c00fd2084e28337b7b6f538326da401c15436a5484389c8d797bba822b19db360db8cb67518ca5a4101090da5f2f8b83766ba7ed2afcedad9d5e37d823e1e4ecec1c1e65e4bd85a2edc17cd8afc25d48b54e18ec9030ca5eed29c27e1e95e766673bbc32b24742e9cad12971acd6cdbe062b06389d0e8bf37958108c90d9bf65d31a1ea57de5bce4e8f63d5d110c866152f3638531ffcd26ea0ac1702511a00011ee462b3f225b6f6f65e9cf59d0385d3cd8b6fd2b18903081bb13821491dadbef7108ad2bd7a592fd2394f65ed9a6ec33de18cf39214f98fa55e2daafb3dc80b56ae76e2dd9b773f54183f4d392d82ddbde84c6b39a0d5f76b80e37f5a9f6d901dc33ad49bdbee1b27fef46403d965fad0622d4c9878e842aadfcb62cd57ae0e744a869f1838b4e1b320212527b7b5fd244a57acfef28edeb3b4ae28a26c5cfcbb6d9d66d3879a2e35e1adc927f7d3fb40cd3feeb17ccc8a615cce0f7ac5a9fdfc28237da7b038ced962d36744178d88e90d9a5f34d29add4083167d1dbbb03fafe261d18fee2cb3f96ec6bf7f4aa4e4e10ead71352669ffdc8674ae9cf9750749cf82f5f55ecab5b5ea93bc309937abe859061bac9ae7cf5adc8a5d532159fd13b4a9aeec825bef4c376c56e59a1518130c6097356cbbe61d3ae6cffb014e7db993e734294781c5a9692ddffe12fbb0952751be5f597cb6b14f156fffa61091d3cce9382eff10d22d1108a5b2bd8259fbedeaeac621d0a88c32a2323199491111c8c008d015c65fbf5d365e86ebcfb05de9316588d0809e3e288c3ecf2c1f9eb27c069db76a56e9b2c7e02b627afcf0f9637f9e5627ce9fb3bba23b5218494985ec166a764f796de1ffc72a0a4b1096a5af6e9d383f74bcb596c91697e91183fc39d1818488de808792a2ede384c550cf9b8be29295aa32942e4098d59d1ba8fac7d958892500c86c2ad715a49890bc8341a0d5bb152cbbf44a540e4849d7eb85673f08f2594b8db03c87f3c617c48d8abfc9d849f468684832f43c2c19721e1e0cb9070f0654838f832241c7c19120ebe0c09075f8684832f43c2c19721e1e0cb9070f0050903bf0e7240654c1a1df967cbe8ff032dd8940affb3dd280000000049454e44ae426082, 'image-lady.png', '6579', 'image/png');

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int NOT NULL,
  `id_trip` int NOT NULL,
  `id_trip2` int NOT NULL,
  `id_client` int NOT NULL,
  `passport_num` int NOT NULL,
  `trip_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `id_trip`, `id_trip2`, `id_client`, `passport_num`, `trip_data`) VALUES
(14, 2, 2, 2, 565478, '2022-12-02'),
(16, 1, 1, 1, 312626, '2022-02-09'),
(19, 1, 1, 1, 222222, '2022-12-07'),
(20, 1, 1, 1, 784353, '2022-02-11'),
(21, 1, 1, 2, 777777, '2023-01-07');

-- --------------------------------------------------------

--
-- Структура таблицы `transport`
--

CREATE TABLE `transport` (
  `id_transport` int NOT NULL,
  `id_driver` int NOT NULL,
  `transport_name` varchar(11) NOT NULL,
  `seats_num` int NOT NULL,
  `has_conditioner` tinyint(1) NOT NULL,
  `max_passengers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `transport`
--

INSERT INTO `transport` (`id_transport`, `id_driver`, `transport_name`, `seats_num`, `has_conditioner`, `max_passengers`) VALUES
(1, 1, 'Ford', 27, 1, 35),
(2, 2, 'Audi', 40, 0, 50),
(3, 3, 'Volvo', 15, 0, 20),
(8, 7, 'Kia', 20, 0, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

CREATE TABLE `trips` (
  `id_trip` int NOT NULL,
  `id_transport` int NOT NULL,
  `id_driver` int NOT NULL,
  `destination` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `depart_point` varchar(20) NOT NULL,
  `trip_data` date NOT NULL,
  `duration` int NOT NULL COMMENT 'hours',
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `trips`
--

INSERT INTO `trips` (`id_trip`, `id_transport`, `id_driver`, `destination`, `depart_point`, `trip_data`, `duration`, `cost`) VALUES
(1, 1, 1, 'Москва', 'Брянск', '2022-02-09', 6, 1000),
(2, 3, 2, 'Брянск', 'Москва', '2022-02-11', 2, 900),
(3, 8, 2, 'Рославль', 'Брянск', '2022-12-16', 2, 300);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `logg` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `logg`, `pass`) VALUES
(1, 'nik', 'nik1'),
(2, 'nikita', 'nikita1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_im`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_trip` (`id_trip`,`id_client`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_trip2` (`id_trip2`);

--
-- Индексы таблицы `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Индексы таблицы `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id_trip`),
  ADD KEY `id_transport` (`id_transport`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id_im` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `transport`
--
ALTER TABLE `transport`
  MODIFY `id_transport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `trips`
--
ALTER TABLE `trips`
  MODIFY `id_trip` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`id_trip`) REFERENCES `trips` (`id_trip`),
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`id_trip2`) REFERENCES `trips` (`id_trip`);

--
-- Ограничения внешнего ключа таблицы `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transport_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id_driver`);

--
-- Ограничения внешнего ключа таблицы `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id_transport`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;