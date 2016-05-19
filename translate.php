<?php
	$userlang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	/*
		Lang = 
		en // english
		ko // korean		
		ja // japanese
		fr // french
		de // german
		zh // chinese
		es // Spanish
		pt // portuguese
		it // italian

		English, Korean by Junghyun Kim
		Chinese, Spanish by Hyunsu Park
		French, Dutch by Sanghyun Chun
		Japanese by Su Young Park
			
	*/
	$lang['en']['passnotdiff'] = "Password and Re-password are not same.";
	$lang['ko']['passnotdiff'] = "패스워드와 패스워드확인이 일치하지 않습니다.";
	$lang['ja']['passnotdiff'] = "パスワードと再パスワードが同じではありません.";
	$lang['fr']['passnotdiff'] = "Mot de passe et Re mot de passe ne sont pas même.";
	$lang['de']['passnotdiff'] = "Passwort und Re-Passwort sind nicht dasselbe.";
	$lang['zh']['passnotdiff'] = "密码和重新密码不相同.";
	$lang['es']['passnotdiff'] = "Contraseña y Re-contraseña no son los mismos.";
	$lang['pt']['passnotdiff'] = "Senha e Re-senha não são os mesmos.";
	$lang['it']['passnotdiff'] = "Password e Re-password non sono uguali.";

	$lang['en']['register'] = "Register";
	$lang['ko']['register'] = "가입하기";
	$lang['ja']['register'] = "登録";
	$lang['fr']['register'] = "enregistrement";
	$lang['de']['register'] = "Registrierung";
	$lang['zh']['register'] = "密码和重新密码不相同.";
	$lang['es']['register'] = "Registro";
	$lang['pt']['register'] = "inscrição";
	$lang['it']['register'] = "Registrazione";
	
	$lang['en']['interest'] = "Interest";
	$lang['ko']['interest'] = "관심분야";
	$lang['ja']['interest'] = "関心";
	$lang['fr']['interest'] = "intérêt";
	$lang['de']['interest'] = "interessieren";
	$lang['zh']['interest'] = "利益";
	$lang['es']['interest'] = "interesar";
	$lang['pt']['interest'] = "interesse";
	$lang['it']['interest'] = "interesse";
		
	$lang['en']['title']="BuzzMovie";
	$lang['fr']['title']="BuzzMovie";
	$lang['de']['title']="BuzzMovie";
	$lang['ko']['title']="버즈버즈바버즈";
	$lang['ja']['title']="BuzzMovie";

	$lang['en']['featured']="Featured";
	$lang['fr']['featured']="En Vedette";
	$lang['de']['featured']="funktions";
	$lang['ko']['featured']="오늘의 영화";
	$lang['ja']['featured']="とくしゅう";

	$lang['en']['search']="Search";
	$lang['fr']['search']="Chercher";
	$lang['de']['search']="Suche";
	$lang['ko']['search']="검색";
	$lang['ja']['search']="けんさく";
	
	$lang['en']['recommend']="Recommend";
	$lang['fr']['recommend']="Recommendation";
	$lang['de']['recommend']="empfehlen";
	$lang['ko']['recommend']="추천";
	$lang['ja']['recommend']="おすすめ";

	$lang['en']['more']="More...";
	$lang['fr']['more']="De Plus...";
	$lang['de']['more']="Mehr...";
	$lang['ko']['more']="더 알아보기...";
	$lang['ja']['more']="もっと";

	$lang['en']['rating']="Rating";
	$lang['fr']['rating']="Evaluation";
	$lang['de']['rating']="Auswertung";
	$lang['ko']['rating']="평점";
	$lang['ja']['rating']="レーティング";

	$lang['en']['runningtime']="Running Time";
	$lang['fr']['runningtime']="Duree de Film";
	$lang['de']['runningtime']="Laufzeit";
	$lang['ko']['runningtime']="상영 시간";
	$lang['ja']['runningtime']="上映時間";

	$lang['en']['genre']="Genre";
	$lang['fr']['genre']="Genre";
	$lang['de']['genre']="Genre";
	$lang['ko']['genre']="장르";
	$lang['ja']['genre']="ジャンル";
	
	$lang['en']['Plot']="Plot";
	$lang['fr']['Plot']="Intrigue";
	$lang['de']['Plot']="Grundstück";
	$lang['ko']['Plot']="줄거리";
	$lang['ja']['Plot']="プロット";

	$lang['en']['Director(s)']="Director(s)";
	$lang['fr']['Director(s)']="Directeur(s)";
	$lang['de']['Director(s)']="Direktor(s)";
	$lang['ko']['Director(s)']="감독";
	$lang['ja']['Director(s)']="監督";

	$lang['en']['Writer(s)']="Writer(s)";
	$lang['fr']['Writer(s)']="Redacteur(s)";
	$lang['de']['Writer(s)']="Schriftsteller(s)";
	$lang['ko']['Writer(s)']="작가";
	$lang['ja']['Writer(s)']="作家";
	
	$lang['en']['Actor(s)']="Actor(s)";
	$lang['fr']['Actor(s)']="Acteur(s)";
	$lang['de']['Actor(s)']="Darsteller(s)";
	$lang['ko']['Actor(s)']="출연 배우";
	$lang['ja']['Actor(s)']="出演俳優";
	
	$lang['en']['Language(s)']="Language(s)";
	$lang['fr']['Language(s)']="Langue(s)";
	$lang['de']['Language(s)']="Sprache(s)";
	$lang['ko']['Language(s)']="언어";
	$lang['ja']['Language(s)']="言語";
	
	$lang['en']['Country(ies)']="Country(ies)";
	$lang['fr']['Country(ies)']="Pays";
	$lang['de']['Country(ies)']="Staat";
	$lang['ko']['Country(ies)']="국가";
	$lang['ja']['Country(ies)']="国";
	
	$lang['en']['login']="LOGIN";
	$lang['fr']['login']="LOGIN";
	$lang['de']['login']="LOGIN";
	$lang['ko']['login']="로그인";
	$lang['ja']['login']="ログイン";
	
	$lang['en']['edit_profile']="Edit Profile";
	$lang['fr']['edit_profile']="Modifier Profile";
	$lang['de']['edit_profile']="Passwort";
	$lang['ko']['edit_profile']="프로필 수정";
	$lang['ja']['edit_profile']="プロファイル編集";
	
	$lang['en']['logout']="Log Out";
	$lang['fr']['logout']="Log Out";
	$lang['de']['logout']="Log Out";
	$lang['ko']['logout']="로그아웃";
	$lang['ja']['logout']="ログアウト";
	
	$lang['en']['login_instruction']="Enter your ID and Password.";
	$lang['fr']['login_instruction']="Tapez votre ID et Mot de Passe.";
	$lang['de']['login_instruction']="Geben Sie Ihre ID und das Passwort.";
	$lang['ko']['login_instruction']="아이디와 비밀번호를 입력해주세요.";
	$lang['ja']['login_instruction']="IDとパスワードを入力してください。";

	$lang['en']['id']="ID";
	$lang['fr']['id']="ID";
	$lang['de']['id']="ID";
	$lang['ko']['id']="아이디";
	$lang['ja']['id']="ID";
	
	$lang['en']['pw']="Password";
	$lang['fr']['pw']="Mot de Passe";
	$lang['de']['pw']="Passwort";
	$lang['ko']['pw']="비밀번호";
	$lang['ja']['pw']="パスワード";

	$lang['en']['pw2']="Password Again";
	$lang['fr']['pw2']="Mot de Passe Encore";
	$lang['de']['pw2']="Passwort erneut";
	$lang['ko']['pw2']="비밀번호 재입력";
	$lang['ja']['pw2']="パスワード再入力";

	$lang['en']['name']="Name";
	$lang['fr']['name']="Nom";
	$lang['de']['name']="Name";
	$lang['ko']['name']="이름";
	$lang['ja']['name']="名前";
	
	$lang['en']['email']="Email";
	$lang['fr']['email']="Email";
	$lang['de']['email']="Email";
	$lang['ko']['email']="이메일";
	$lang['ja']['email']="イーメール";

	$lang['en']['gender']="Gender";
	$lang['fr']['gender']="Sexe";
	$lang['de']['gender']="Geschlecht";
	$lang['ko']['gender']="성별";
	$lang['ja']['gender']="性別";

	$lang['en']['class']="Class";
	$lang['fr']['class']="Classe";
	$lang['de']['class']="Klasse";
	$lang['ko']['class']="학번";
	$lang['ja']['class']="卒業年度";

	$lang['en']['major']="Major";
	$lang['fr']['major']="Majeur";
	$lang['de']['major']="Haupt";
	$lang['ko']['major']="전공";
	$lang['ja']['major']="専攻";
	
	$lang['en']['login_fail']="Check ID/Password Again.";
	$lang['fr']['login_fail']="Verifiez ID/Mot de Passe.";
	$lang['de']['login_fail']="überprüfe dein ID und Passwort.";
	$lang['ko']['login_fail']="아이디와 비밀번호를 다시 한번 확인해주세요.";
	
	$lang['en']['signin']="Sign In";
	$lang['fr']['signin']="Entrer";
	$lang['de']['signin']="Anmelden";
	$lang['ko']['signin']="로그인";
	$lang['ja']['signin']="サインイン";

	$lang['en']['signup']="Sign Up";
	$lang['fr']['signup']="Enregistrer";
	$lang['de']['signup']="Einschreiben";
	$lang['ko']['signup']="회원가입";
	$lang['ja']['signup']="サインアップ";
	
	$lang['en']['registration']="Registration";
	$lang['fr']['registration']="Enregistration";
	$lang['de']['registration']="Registrierung";
	$lang['ko']['registration']="회원가입";
	$lang['ja']['registration']="会員登録";
	
	$lang['en']['registration_instruction']="Please fill-in all entries.";
	$lang['fr']['registration_instruction']="Veuillez Remplir Tous Inscriptions.";
	$lang['de']['registration_instruction']="Bitte füllen Sie alle Einträge.";
	$lang['ko']['registration_instruction']="모든 항목을 입력하여 주세요.";
	$lang['ja']['registration_instruction']="すべての項目を入力してください。";

	$lang['en']['male']="Male";
	$lang['fr']['male']="Homme";
	$lang['de']['male']="Mann";
	$lang['ko']['male']="남성";
	$lang['ja']['male']="男";
	
	$lang['en']['female']="Female";
	$lang['fr']['female']="Femme";
	$lang['de']['female']="Frau";
	$lang['ko']['female']="여성";
	$lang['ja']['female']="女";
	
	$lang['en']['registration_idformat1']="The length of ID should be more than 6 and less than 15.";
	$lang['fr']['registration_idformat1']="La longeur de votre ID doit etre plus que 6 et moins que 15.";
	$lang['de']['registration_idformat1']="Die Länge der ID sollte mehr als 6 und weniger als 15.";
	$lang['ko']['registration_idformat1']="아이디는 7자 이상 14자 이하여야 합니다.";
	$lang['ja']['registration_idformat1']="IDの長さが6以上と15未満でなければなりません。";

	$lang['en']['registration_idformat2']="ID should be composed with lower and upper alphabets and digits only.";
	$lang['fr']['registration_idformat2']="ID doit etre compose seulement avec des lettres majuscules et minuscules.";
	$lang['de']['registration_idformat2']="ID sollte mit unteren und oberen Buchstaben und Ziffern bestehen nur.";
	$lang['ko']['registration_idformat2']="아이디는 영문 대소문자와 숫자로만 만드실 수 있습니다.";
	$lang['ja']['registration_idformat2']="ユーザ名は、英語、大文字と小文字と数字のみ作成できます。";

	$lang['en']['registration_pwformat1']="The length of Password should be more than 6 and less than 15.";
	$lang['fr']['registration_pwformat1']="La longueur de mot de passe doit etre plus que 6 et moins que 15.";
	$lang['de']['registration_pwformat1']="Die Länge des Passwort sollte mehr als 6 und weniger als 15.";
	$lang['ko']['registration_pwformat1']="비밀번호는 7자 이상 14자 이하여야 합니다.";
	$lang['ja']['registration_pwformat1']="パスワードの長さが6以上と15未満でなければなりません。";

	$lang['en']['registration_emailformat1']="The format of Email is not correct.";
	$lang['fr']['registration_emailformat1']="Le format d'Email n'est pas correcte.";
	$lang['de']['registration_emailformat1']="Das Format der E-Mail ist nicht korrekt.";
	$lang['ko']['registration_emailformat1']="이메일 형식이 올바르지 않습니다.";
	$lang['ja']['registration_emailformat1']="メールの形式が正しくありません。";
	
	$lang['en']['registration_sameid']="The same id already exists.";
	$lang['fr']['registration_sameid']="Il y a un meme ID qui existe deja.";
	$lang['de']['registration_sameid']="Das gleiche ID ist bereits vorhanden.";
	$lang['ko']['registration_sameid']="이미 같은 아이디가 존재합니다.";
	$lang['ja']['registration_sameid']="同じIDが既に存在します。";

	$lang['en']['movie']="Movie";
	$lang['fr']['movie']="Film";
	$lang['de']['movie']="Film";
	$lang['ko']['movie']="영화";
	$lang['ja']['movie']="映画";

	$lang['en']['series']="Series";
	$lang['fr']['series']="Series";
	$lang['de']['series']="Serie";
	$lang['ko']['series']="시리즈";
	$lang['ja']['series']="シリーズ";

	$lang['en']['episode']="Episode";
	$lang['fr']['episode']="Episode";
	$lang['de']['episode']="Episode";
	$lang['ko']['episode']="에피소드";
	$lang['ja']['episode']="エピソード";

	$lang['en']['searchbyname']="Search by name";
	$lang['fr']['searchbyname']="Chercher par nom";
	$lang['de']['searchbyname']="Suche mit Name";
	$lang['ko']['searchbyname']="이름으로 검색";
	$lang['ja']['searchbyname']="名前で検索";

	$lang['en']['howwasyourmovie']="How was your Movie?";
	$lang['fr']['howwasyourmovie']="Comment etait le film?";
	$lang['de']['howwasyourmovie']="Wie war der Film?";
	$lang['ko']['howwasyourmovie']="영화가 어떠셨나요?";
	$lang['ja']['howwasyourmovie']="映画はどうだった?";

	$lang['en']['rate']="Rate";
	$lang['fr']['rate']="Evaluation";
	$lang['de']['rate']="Auswertung";
	$lang['ko']['rate']="평점 매기기";
	$lang['ja']['rate']="評点課すこと";

	$lang['en']['unrate']="Unrate";
	$lang['fr']['unrate']="Annuler Evaluation";
	$lang['de']['unrate']="Abbrechen Bewertung";
	$lang['ko']['unrate']="평점 취소하기";
	$lang['ja']['unrate']="評価をキャンセル";

	$lang['en']['cancel']="Cancel";
	$lang['fr']['cancel']="Annuler";
	$lang['de']['cancel']="stornieren";
	$lang['ko']['cancel']="취소";
	$lang['ja']['cancel']="キャンセル";

	$lang['en']['noentriesfound']="No Entries Found.";
	$lang['fr']['noentriesfound']="Aucun resultat.";
	$lang['de']['noentriesfound']="keine Einträge gefunden.";
	$lang['ko']['noentriesfound']="검색 결과가 없습니다.";
	$lang['ja']['noentriesfound']="検索結果がありません。";

	$lang['en']['sucrat']="Successfully rated.";
	$lang['fr']['sucrat']="Evaluation Reussie.";
	$lang['de']['sucrat']="erfolgreich bewertet.";
	$lang['ko']['sucrat']="정상적으로 평가하였습니다.";
	$lang['ja']['sucrat']="正常に評価しました。";

	$lang['en']['sucunrat']="Successfully unrated.";
	$lang['fr']['sucunrat']="Annulation Reussie.";
	$lang['de']['sucunrat']="Erfolgreich storniert Bewertung.";
	$lang['ko']['sucunrat']="정상적으로 평가를 취소 하였습니다.";
	$lang['ja']['sucunrat']="正常に評価をキャンセルしました。";

	$lang['en']['recommendation']="Choose Movie Recommendation Criteria";
	$lang['fr']['recommendation']="Choisissez Critere de Recommendation";
	$lang['de']['recommendation']="Film Empfehlung Kriterien wählen";
	$lang['ko']['recommendation']="영화 추천 기준을 선택하세요.";
	$lang['ja']['recommendation']="映画の勧告基準を選択します。";

	$lang['en']['overall']="by Overall recommendation";
	$lang['fr']['overall']="par Recoomendation Globale";
	$lang['de']['overall']="Allgemeine Empfehlung";
	$lang['ko']['overall']="전체";
	$lang['ja']['全体']="";

	$lang['en']['majorrecommendation']="from Students with the same major as you.";
	$lang['fr']['majorrecommendation']="par les etudiants dans le meme majeur que vous.";
	$lang['de']['majorrecommendation']="von Studenten mit dem gleichen großen, wie Sie.";
	$lang['ko']['majorrecommendation']="전공별 추천";
	$lang['ja']['majorrecommendation']="専攻に応じてお勧めします。";

	$lang['en']['genderrecommendation']="from Students with the same gender as you.";
	$lang['fr']['genderrecommendation']="par les edudiants du meme sexe.";
	$lang['de']['genderrecommendation']="von Studenten mit dem gleichen Geschlecht wie Sie.";
	$lang['ko']['genderrecommendation']="성별별 추천";
	$lang['ja']['genderrecommendation']="性別によってお勧めします。";

	$lang['en']['classrecommendation']="from your Classmates.";
	$lang['fr']['classrecommendation']="par votre camarades de classe.";
	$lang['de']['classrecommendation']="von Ihrem Mitschüler.";
	$lang['ko']['classrecommendation']="학번별 추천";
	$lang['ja']['classrecommendation']="卒業年度に応じてお勧めします。";

	$lang['en']['choosecriteria']="Choose your criteria.";
	$lang['fr']['choosecriteria']="Choisissez votre critere.";
	$lang['de']['choosecriteria']="Wählen Sie Ihre Kriterien.";
	$lang['ko']['choosecriteria']="영화 추천 기준 선택";
	$lang['ja']['choosecriteria']="映画推薦基準を選択";

	$lang['it']['title']="BuzzFilm";
    	$lang['pt']['title']="BuzzFilme";


    	$lang['it']['featured']="Il film di oggi";
    	$lang['pt']['featured']="O filme de hoje";


    	$lang['it']['search']="Ricerca";
    	$lang['pt']['search']="pesquisa";


    	$lang['it']['recommend']="Raccomandare";
    	$lang['pt']['recommend']="Recommendar";


    	$lang['it']['more']="Di Più...";
    	$lang['pt']['more']="Mais...";


    	$lang['it']['rating']="valutazione";
    	$lang['pt']['rating']="classificação";


    	$lang['it']['runningtime']="tempo di esecuzione";
    	$lang['pt']['runningtime']="tempo de execução";


    	$lang['it']['genre']="Genere";
    	$lang['pt']['genre']="gênero";

    	$lang['it']['Plot']="Tracciare";
    	$lang['pt']['Plot']="Enredo";


    	$lang['it']['Director(s)']="Direttore";
    	$lang['pt']['Director(s)']="Diretor";


    	$lang['it']['Writer(s)']="scrittore";
    	$lang['pt']['Writer(s)']="Escritor";


    	$lang['it']['Actor(s)']="Attore";
    	$lang['pt']['Actor(s)']="Ator";

    	$lang['it']['Language(s)']="Lingua";
    	$lang['pt']['Language(s)']="Língua";

    	$lang['it']['Country(ies)']="Nazione";
    	$lang['pt']['Country(ies)']="País";


    	$lang['it']['login']="Accesso";
    	$lang['pt']['login']="Entrar";

    	$lang['it']['edit_profile']="Modifica prifile";
    	$lang['pt']['edit_profile']="Editar prifile";


    	$lang['it']['logout']="Disconnettersi";
    	$lang['pt']['logout']="Sair";

    	$lang['it']['login_instruction']="Inserisci il tuo ID e la password";
    	$lang['pt']['login_instruction']="Digite seu ID e senha";

    	$lang['it']['id']="ID";
    	$lang['pt']['id']="ID";

    	$lang['it']['pw']="Parola d'ordine";
    	$lang['pt']['pw']="Senha";

    	$lang['it']['pw2']="Di nuovo la password";
    	$lang['pt']['pw2']="Senha novamente";

    	$lang['it']['name']="Nome";
    	$lang['pt']['name']="Nome";

    	$lang['it']['email']="Email";
    	$lang['pt']['email']="Email";

    	$lang['it']['gender']="Genere";
    	$lang['pt']['gender']="Gênero";

    	$lang['it']['class']="Classe";
    	$lang['pt']['class']="Classe";

    	$lang['it']['major']="Maggiore";
    	$lang['pt']['major']="Principal";

    	$lang['it']['login_fail']="Controllare la ID e la password.";
    	$lang['pt']['login_fail']="Verificar ID e senha novamente";

    	$lang['it']['signin']="Registrati";
    	$lang['pt']['signin']="Assinar em";

    	$lang['it']['signup']="Registrazione";
    	$lang['pt']['signup']="Inscrever-se";

    	$lang['it']['registration']="Registrazione";
    	$lang['pt']['registration']="Inscrição";

    	$lang['it']['registration_instruction']="Si prega di compilare i tutte le voci.";
    	$lang['pt']['registration_instruction']="Por favor, preencha os todas as entradas.";

    	$lang['it']['male']="Maschio";
    	$lang['pt']['male']="Masculino";

    	$lang['it']['female']="Femmina";
    	$lang['pt']['female']="Fêmea";

    	$lang['it']['registration_idformat1']="La lunghezza di ID deve essere più di 6 e meno di 15.";
    	$lang['pt']['registration_idformat1']="O comprimento de identificação deve ser superior a 6 e inferior a 15.";

    	$lang['it']['registration_idformat2']="ID dovrebbe essere composta con lettere e cifre inferiori e superiori solo.";
    	$lang['pt']['registration_idformat2']="ID deve ser composto com letras e dígitos inferiores e superiores única.";

    	$lang['it']['registration_pwformat1']="La lunghezza della password deve essere più di 6 e meno di 15.";
    	$lang['pt']['registration_pwformat1']="O comprimento da palavra-passe deve ser superior a 6 e inferior a 15.";

    	$lang['it']['registration_emailformat1']="Il formato di e-mail non è corretto.";
    	$lang['pt']['registration_emailformat1']="O formato do e-mail não está correta.";

    	$lang['it']['registration_sameid']="Lo stesso ID esiste già.";
    	$lang['pt']['registration_sameid']="O mesmo ID já existe.";

    	$lang['it']['movie']="Film";
    	$lang['pt']['movie']="Filme";


    	$lang['it']['series']="Serie";
    	$lang['pt']['series']="Série";

    	$lang['it']['episode']="Episodio";
    	$lang['pt']['episode']="Episódio";

    	$lang['it']['searchbyname']="Ricerca per nome";
    	$lang['pt']['searchbyname']="Procura por nome";

    	$lang['it']['howwasyourmovie']="Come è stato il tuo film?";
    	$lang['pt']['howwasyourmovie']="Como foi o seu filme?";

    	$lang['it']['rate']="Tasso";
    	$lang['pt']['rate']="Taxa";

    	$lang['it']['unrate']="Senza rating";
    	$lang['pt']['unrate']="Unrate";

    	$lang['it']['cancel']="Annulla";
    	$lang['pt']['cancel']="Cancelar";

    	$lang['it']['noentriesfound']="Nessuna informazione disponibile.";
    	$lang['pt']['noentriesfound']="Não foram econtradas entradas.";

    	$lang['it']['sucrat']="Valutato con successo.";
    	$lang['pt']['sucrat']="Classificado com sucesso.";

    	$lang['it']['sucunrat']="Unrated successo.";
    	$lang['pt']['sucunrat']="Sem classificação com sucesso.";

    	$lang['it']['recommendation']="Scegli Film Criteri Raccomandazione";
    	$lang['pt']['recommendation']="Escolha Filme Critérios Recomendação.";

    	$lang['it']['overall']="Dalla raccomandazione generale";
    	$lang['pt']['overall']="Por recomendação geral";

    	$lang['it']['majorrecommendation']="Da studenti con lo stesso importante con voi.";
    	$lang['pt']['majorrecommendation']="De estudantes com o mesmo grande com você";

    	$lang['it']['genderrecommendation']="Da studenti con lo stesso genere con voi.";
    	$lang['pt']['genderrecommendation']="De estudantes com o mesmo sexo com você";

    	$lang['it']['classrecommendation']="Da Classmate con voi.";
    	$lang['pt']['classrecommendation']="Do Classmate com você";

    	$lang['it']['choosecriteria']="Scegli i tuoi criteri.";
    	$lang['pt']['choosecriteria']="Escolha os seus critérios";
    	
    	//Chinese and Spanish
   	$lang['zh']['title']="BuzzMovie";
	$lang['es']['title']="BuzzMovie";
	
	$lang['zh']['featured']="精选";
	$lang['es']['featured']="destacado";
	
	$lang['zh']['search']="搜索";
	$lang['es']['search']="buscar";
	
	$lang['zh']['recommzhd']="推荐";
	$lang['es']['recommzhd']="Recomendar";
	
	$lang['zh']['more']="更多";
	$lang['es']['more']="Más";
	
	$lang['zh']['rating']="评分";
	$lang['es']['rating']="clasificación";
	
	$lang['zh']['runningtime']="运行时间";
	$lang['es']['runningtime']="tiempo de ejecución";
	
	$lang['zh']['gzhre']="类型";
	$lang['es']['gzhre']="género";
	
	$lang['zh']['Plot']="情节";
	$lang['es']['Plot']="Trama";
	
	$lang['zh']['Director(s)']="导向器";
	$lang['es']['Director(s)']="Director";
	
	$lang['zh']['Writer(s)']="作家";
	$lang['es']['Writer(s)']="Escritor";
	
	$lang['zh']['Actor(s)']="演员";
	$lang['es']['Actor(s)']="Actor";
	
	$lang['zh']['Language(s)']="语言";
	$lang['es']['Language(s)']="Idioma";
	
	$lang['zh']['Country(ies)']="国家";
	$lang['es']['Country(ies)']="País";
	
	
	$lang['zh']['login']="登录";
	$lang['es']['login']="iniciar sesión";
	
	$lang['zh']['edit_profile']="编辑个人资料";
	$lang['es']['edit_profile']="Editar perfil";
	
	
	$lang['zh']['logout']="登出";
	$lang['es']['logout']="cerrar sesión";
	
	$lang['zh']['login_instruction']="输入您的ID和密码";
	$lang['es']['login_instruction']="Introduzca su ID y contraseña";
	
	$lang['zh']['id']="ID";
	$lang['es']['id']="ID";
	
	$lang['zh']['pw']="密码";
	$lang['es']['pw']="contraseña";
	
	$lang['zh']['pw2']="再次密码";
	$lang['es']['pw2']="contraseña de nuevo";
	
	$lang['zh']['name']="名称";
	$lang['es']['name']="nombre";
	
	$lang['zh']['email']="Email";
	$lang['es']['email']="correo electrónico";
	
	$lang['zh']['gzhder']="性别";
	$lang['es']['gzhder']="género";
	
	$lang['zh']['class']="类";
	$lang['es']['class']="clase";
	
	$lang['zh']['major']="重大的";
	$lang['es']['major']="mayor";
	
	$lang['zh']['login_fail']="检查你的ID和密码";
	$lang['es']['login_fail']="comprobar su ID y contraseña";
	
	$lang['zh']['signin']="签到";
	$lang['es']['signin']="registrarse";
	
	$lang['zh']['signup']="注册";
	$lang['es']['signup']="Regístrate";
	
	$lang['zh']['registration']="注册";
	$lang['es']['registration']="registro";
	
	$lang['zh']['registration_instruction']="请填写所有条目";
	$lang['es']['registration_instruction']="rellenar los todas las entradas";
	
	$lang['zh']['male']="男";
	$lang['es']['male']="masculino";
	
	$lang['zh']['female']="女";
	$lang['es']['female']="hembra";
	
	$lang['zh']['registration_idformat1']="ID的长度应大于6且小于15";
	$lang['es']['registration_idformat1']="La longitud de ID debe ser más de 6 y menos de 15";
	
	$lang['zh']['registration_idformat2']="标识应下限和上限字母和数字只组成";
	$lang['es']['registration_idformat2']="ID debe estar compuesto con alfabetos y sólo dígitos inferiores y superiores";
	
	$lang['zh']['registration_pwformat1']="密码的长度应大于6且小于15";
	$lang['es']['registration_pwformat1']="La longitud de la contraseña debe ser más de 6 y menos de 15.";
	
	$lang['zh']['registration_emailformat1']="电子邮件的格式不正确";
	$lang['es']['registration_emailformat1']="El formato del correo electrónico no es correcta";
	
	$lang['zh']['registration_sameid']="同一ID已经存在";
	$lang['es']['registration_sameid']="El mismo ID ya existe";
	
	$lang['zh']['movie']="电影";
	$lang['es']['movie']="película";
	
	$lang['zh']['series']="系列";
	$lang['es']['series']="serie";
	
	$lang['zh']['episode']="插曲";
	$lang['es']['episode']="episodio";
	
	$lang['zh']['searchbyname']="按名称搜索";
	$lang['es']['searchbyname']="buscar por nombre";
	
	$lang['zh']['howwasyourmovie']="如何是你的电影？";
	$lang['es']['howwasyourmovie']="¿Cómo fue tu película?";
	
	$lang['zh']['rate']="率";
	$lang['es']['rate']="Califica";
	
	$lang['zh']['unrate']="取消利率";
	$lang['es']['unrate']="cancelar su calificación";
	
	$lang['zh']['cancel']="取消";
	$lang['es']['cancel']="cancelar";
	
	$lang['zh']['nozhtriesfound']="没有发现条目";
	$lang['es']['nozhtriesfound']="entradas no encontradas";
	
	$lang['zh']['sucrat']="额定成功";
	$lang['es']['sucrat']="puntuado";
		
	$lang['zh']['sucunrat']="成功取消评级";
	$lang['es']['sucunrat']="Puntuación cancelado correctamente";
	
	$lang['zh']['recommzhdation']="选择电影推荐准则";
	$lang['es']['recommzhdation']="Elija Película Recomendación Criterios";
	
	$lang['zh']['overall']="通过全面推荐";
	$lang['es']['overall']="por recomendación general";
	
	$lang['zh']['majorrecommzhdation']="从与您相约专业大学生";
	$lang['es']['majorrecommzhdation']="de estudiantes con el mismo importante con usted";
	
	$lang['zh']['gzhderrecommzhdation']="从与你同性别学生";
	$lang['es']['gzhderrecommzhdation']="de estudiantes con el mismo sexo contigo";
	
	$lang['zh']['classrecommzhdation']="从你的同学";
	$lang['es']['classrecommzhdation']="de sus compañeros de clase";
	
	$lang['zh']['choosecriteria']="选择您的标准";
	$lang['es']['choosecriteria']="Elegir los criterios";

?>
