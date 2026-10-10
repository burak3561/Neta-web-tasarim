<?php
declare(strict_types=1);

$groups = [
    'tahribatsiz' => [
        'title' => 'Tahribatsız Muayene',
        'eyebrow' => 'NDT',
        'text' => 'Parçayı kesmeden yüzey ve iç süreksizlikleri, et kalınlığını ve korozyon kaybını ararız.',
        'image' => 'assets/img/kart-ndt.jpg',
        'lead' => 'Tahribatsız muayene, ekipmanı hizmet dışı bırakmadan veya numune almadan malzeme bütünlüğünü değerlendirir.',
        'body' => [
            'Kaynak dikişleri, döküm ve dövme parçalar, borular, basınçlı kaplar ve depolama tankları bu kapsamdadır. Yöntem, malzeme cinsine, erişim yönüne ve aranan hatanın türüne göre seçilir.',
            'Klasik yöntemler imalat kontrolünde hızlı sonuç verir. Gelişmiş teknikler ise kalın kesitlerde, radyasyon kullanmadan ve kayıt altına alınabilir veri ile çalışır.',
        ],
    ],
    'ileri' => [
        'title' => 'İleri NDT Uygulamaları',
        'eyebrow' => 'SAHA',
        'text' => 'Tank tabanı ve boru hatlarını, mümkün olduğunca işletme sürerken robotik araçlarla tararız.',
        'image' => 'assets/img/inovasyon-tank.jpg',
        'lead' => 'Erişimi zor hatlar ve servisteki tanklar için duruşu kısaltan ileri muayene uygulamaları.',
        'body' => [
            'Amaç, metal kaybı, çukurlaşma ve kaynak hatalarını erken görmek; temizlik, söküm ve kapalı alana girişi ancak gerçekten gerektiğinde planlamaktır.',
        ],
    ],
    'tahribatli' => [
        'title' => 'Tahribatlı Testler',
        'eyebrow' => 'LABORATUVAR',
        'text' => 'Çekme, darbe, eğme, sertlik ve kimyasal analizle malzemenin mekanik karakterini ölçeriz.',
        'image' => 'assets/img/kart-laboratuvar.jpg',
        'lead' => 'Numune üzerinden yapılan deneyler, kaynak prosedürünün ve malzeme partisinin şartnameye uyup uymadığını gösterir.',
        'body' => [
            'Deneyler ilgili ürün standardına göre hazırlanır. Sonuç, kabul sınırlarıyla birlikte raporlanır. Numune işleme de aynı iş emrinin parçası olabilir.',
        ],
    ],
    'gozetim' => [
        'title' => 'Üçüncü Taraf Gözetim',
        'eyebrow' => 'DENETİM',
        'text' => 'İmalat ve montajı, alıcı ile yükleniciden bağımsız olarak yerinde izleriz.',
        'image' => 'assets/img/kart-gozetim.jpg',
        'lead' => 'Çelik yapıdan basınçlı kaba, boru hattından vagon imalatına kadar üretimin kritik adımları sahada doğrulanır.',
        'body' => [
            'Gözetim; malzeme izlenebilirliği, kaynak sırası, boyut kontrolü, test paketi ve sevkiyat öncesi durumu kapsar. Bulgular günlük rapor ve uygunsuzluk kaydı olarak tutulur.',
        ],
    ],
    'periyodik' => [
        'title' => 'Periyodik Muayene',
        'eyebrow' => 'İŞLETME',
        'text' => 'Kaldırma ekipmanı, basınçlı kap, boru hattı ve tanklarda dönemsel kontrol ve ömür değerlendirmesi yaparız.',
        'image' => 'assets/img/inovasyon-boru.jpg',
        'lead' => 'Periyodik muayene, ekipmanın bir sonraki işletme aralığında güvenle kullanılıp kullanılamayacağını ortaya koyar.',
        'body' => [
            'Kontrol; görsel durum, et kalınlığı, emniyet donanımı ve varsa hesapla desteklenen kalan ömür değerlendirmesini içerir.',
        ],
    ],
    'kaynak' => [
        'title' => 'Kaynak Mühendisliği',
        'eyebrow' => 'KAYNAK',
        'text' => 'Kaynak prosedürü onayı ve kaynakçı eğitimini imalat standardına göre yürütürüz.',
        'image' => 'assets/img/inovasyon-kaynak.jpg',
        'lead' => 'Doğru prosedür ve yetkin kaynakçı, kaynaklı imalatın kabulünün temelidir.',
        'body' => [
            'WPS ve WPQR çalışmaları ilgili uygulama koduna göre planlanır. Eğitim, belgelendirme sınavından önce yönteme ve malzemeye özel yapılır.',
        ],
    ],
    'boya' => [
        'title' => 'Boya ve Kaplama Testleri',
        'eyebrow' => 'KAPLAMA',
        'text' => 'Boya ve kaplamanın yoğunluk, yapışma, gözenek, kür ve soyulma davranışını test ederiz.',
        'image' => 'assets/img/inovasyon-laboratuvar.jpg',
        'lead' => 'Kaplama, korozyona karşı ilk bariyerdir. Uygulama öncesi malzeme ve uygulama sonrası film ayrı ayrı kontrol edilir.',
        'body' => [
            'Toz ve yaş sistemlerde laboratuvar deneyleri ile saha testleri birlikte okunur. Amaç, film kalınlığı, süreklilik ve yüzeye tutunmanın şartnameyle uyumudur.',
        ],
    ],
    'belge' => [
        'title' => 'Personel Belgelendirme',
        'eyebrow' => 'BELGE',
        'text' => 'Tahribatsız muayene personeli ile kaynakçı ve kaynak operatörlerini ilgili standartlara göre belgelendiririz.',
        'image' => 'assets/img/kart-belgelendirme.jpg',
        'lead' => 'Belge, kişinin belirli bir yöntem, seviye ve sektör kapsamında yetkin olduğunu gösterir.',
        'body' => [
            'Başvuru, görme yeterliliği ve endüstriyel deneyim kayıtları program kurallarına göre alınır. Belge kullanımı ve sorgulama koşulları adaya yazılı bildirilir.',
        ],
    ],
    'egitim' => [
        'title' => 'Eğitim',
        'eyebrow' => 'AKADEMİ',
        'text' => 'Tahribatsız muayene yöntemleri için eğitim ve sınav takvimi düzenleriz.',
        'image' => 'assets/img/kariyer.jpg',
        'lead' => 'Eğitim, yöntem bilgisini saha uygulamasına bağlar. Sınav tarihleri programa göre ilan edilir.',
        'body' => [
            'Program; yöntem süresi, pratik uygulama ve değerlendirme ölçütlerini içerir. Güncel takvim ve ücret için merkez ofisle iletişime geçilir.',
        ],
    ],
    'deniz' => [
        'title' => 'Deniz Gözetim',
        'eyebrow' => 'DENİZ',
        'text' => 'Yük miktarı, liman sahası, istif emniyeti, gemi operasyonu ve lashing gözetimi yaparız.',
        'image' => 'assets/img/inovasyon-deniz.jpg',
        'lead' => 'Deniz gözetimi, yükün kararlaştırılan miktar ve durumda teslim edildiğini bağımsız raporla kayıt altına alır.',
        'body' => [
            'Hasar, eksik miktar veya bağlama uygunsuzluğu görüldüğünde yer, zaman ve olası sorumluluk raporda ayrılır.',
        ],
    ],
];

$services = [
    'ut' => [
        'group' => 'tahribatsiz',
        'title' => 'Ultrasonik Muayene (UT)',
        'lead' => 'Yüksek frekanslı ses dalgalarıyla iç süreksizlik, et kalınlığı ve bazı boyutlar ölçülür.',
        'body' => [
            'Prob, piezoelektrik etkiyle kısa ses darbeleri üretir. Yankının dönüş süresi hatanın derinliğini, genliği ise büyüklüğü hakkında bilgi verir. Bu darbeli yankı yöntemi 1940’lardan beri kaynaklı imalatta kullanılır.',
            'Tek taraftan erişim çoğu zaman yeterlidir. Kalın çelik yapılarda, pah kaynaklarında ve seri profil ya da boru kontrolünde yüksek hassasiyet sağlar.',
            'Sonuç operatörün eğitimine ve deneyimine bağlıdır. Yüzey durumu, malzeme yapısı ve prob seçimi raporun güvenilirliğini belirler.',
        ],
        'points' => ['Kaynaklı imalat', 'Basınçlı kap ve boru', 'Döküm ve dövme', 'Enerji ve savunma parçaları'],
    ],
    'rt' => [
        'group' => 'tahribatsiz',
        'title' => 'Radyografik Muayene (RT)',
        'lead' => 'Işın, parçanın içinden geçerek film veya dijital dedektörde kalıcı bir görüntü bırakır.',
        'body' => [
            'Çatlak, cüruf ve gaz boşluğu ışını çevresindeki sağlam metalden farklı soğurur. Bu fark, görüntüde yoğunluk değişimi olarak okunur.',
            'Kaynak dikişi, döküm ve basınçlı ekipman kontrolünde iç hataların arşivlenebilir kaydı için tercih edilir. Çalışma alanı radyasyon güvenliği kurallarına göre çevrilir.',
        ],
        'points' => ['Alın kaynakları', 'Döküm iç hataları', 'Kalıcı film veya dijital kayıt'],
    ],
    'pt' => [
        'group' => 'tahribatsiz',
        'title' => 'Sıvı Penetrant Muayene (PT)',
        'lead' => 'Yüzeye açık çatlak ve gözenekler, renkli veya floresan sıvıyla görünür hale getirilir.',
        'body' => [
            'Sıvı süreksizliğin ağzına işler, fazlası temizlenir, developer kusuru yüzeye taşır. Yöntem gözeneksiz malzemelerin çoğunda, hem atölyede hem sahada uygulanır.',
            'Alüminyum, östenitik paslanmaz, bakır ve titanyum gibi mıknatıslanmayan metallerde yüzey çatlağı aramak için güçlü bir seçenektir. Yatırım düşüktür; değerlendirme basittir ve diğer yöntemleri tamamlar.',
        ],
        'points' => ['Döküm ve dövme yüzeyleri', 'Kaynak ağızları', 'Yorulma çatlağı riski taşıyan parçalar'],
    ],
    'mt' => [
        'group' => 'tahribatsiz',
        'title' => 'Manyetik Parçacık Muayene (MT)',
        'lead' => 'Ferromanyetik malzemede yüzey ve yüzeye yakın hatalar, kaçak manyetik alanla bulunur.',
        'body' => [
            'Parça mıknatıslanır. Çatlak, alan çizgilerini dışarı kaçırır; demir tozu bu kaçakta toplanır. Demir, nikel ve kobalt alaşımları dışında uygulanmaz.',
            'Penetrant muayeneye göre daha hızlıdır, yüzey hazırlığı sınırlıdır ve yüzeye çok yakın hataları da gösterebilir. Döküm, dövme ve kaynaklarda sık kullanılır.',
        ],
        'points' => ['Karbon çelik kaynaklar', 'Dövme parçalar', 'Servis sırasında yüzey çatlakları'],
    ],
    'vt' => [
        'group' => 'tahribatsiz',
        'title' => 'Gözle Muayene (VT)',
        'lead' => 'Şekil, yüzey ve hasar, çıplak göz veya optik yardımcıyla kontrol edilir.',
        'body' => [
            'Çatlak, gözenek, cüruf, çekme boşluğu, yanma oluğu, geometri sapması ve yüzey hasarı bu adımda not edilir. Diğer tahribatsız yöntemlerden önce uygulanan temel kontroldür.',
            'Aydınlatma, görüş açısı ve yüzey temizliği sonucu doğrudan etkiler. Gerekirse ölçü aleti, ayna ve endoskop kullanılır.',
        ],
        'points' => ['Kaynak profili', 'Yüzey durumu', 'Montaj geometrisi'],
    ],
    'paut-tofd' => [
        'group' => 'tahribatsiz',
        'title' => 'PAUT ve TOFD',
        'lead' => 'Phased array ve uçuş süresi kırınımı, kaynak ve korozyonu radyasyonsuz, kayıtlı veri ile tarar.',
        'body' => [
            'PAUT, çok elemanlı probda darbeleri geciktirerek ses demetini yönlendirir ve odaklar. Prob yerinden oynamadan geniş bir bölge taranabilir. Yaklaşık 3 mm ile 200 mm arası kalınlıklarda kaynak, çatlak, et kalınlığı ve korozyon için kullanılır. Klasik ultrason ve bazı işlerde radyografinin yerine geçebilir. Kurulum hızlıdır, iyonize radyasyon yoktur, uzunluk ve derinlik birlikte okunur.',
            'TOFD, 1970’lerin sonunda yaygınlaşan bir düzenektir. Yaklaşık 45 derece açılı iki prob, biri verici biri alıcı olacak şekilde kaynak boyunca ilerler. Yanal dalga ve arka cidar sinyalleri arasındaki kırınım, B-tarama görüntüsünde hatayı gösterir. Değerlendirme bilgisayar desteklidir.',
        ],
        'points' => ['Kalın alın kaynakları', 'Çatlak boyutlandırma', 'Korozyon haritası', 'Dijital arşiv'],
    ],
    'mfl' => [
        'group' => 'tahribatsiz',
        'title' => 'Manyetik Akı Kaçağı (MFL)',
        'lead' => 'Güçlü mıknatıs, metal kaybı olan bölgede akıyı dışarı kaçırır; algılayıcı bu kaçağı ölçer.',
        'body' => [
            'Yöntem özellikle boru hatları ve tank tabanlarında çukurlaşma ile genel metal kaybını arar. Kaçağın şiddeti, kaybın derinliği hakkında tahmin üretir.',
            'Kaplama ve yüzey durumu sinyali etkiler. Bu yüzden tarama, kaldırma yüksekliğini izleyen sensörlerle birlikte yorumlanır.',
        ],
        'points' => ['Tank tabanı', 'Boru hattı', 'Çukurlaşma ve metal kaybı'],
    ],
    'tank-duvar' => [
        'group' => 'tahribatsiz',
        'title' => 'Tank ve Basınçlı Kap Duvarı',
        'lead' => 'Paletli tarayıcı, duvardaki kaynak ve korozyonu uzaktan ve kayıtlı olarak gezer.',
        'body' => [
            'İskele kurmanın riskli olduğu yüksekliklerde kaynak hatası, ana metal süreksizliği, korozyon kaybı ve et kalınlığı aynı geçişte toplanabilir.',
            'Tarama hattı ve ölçüm noktaları raporda konumla birlikte verilir. Böylece bir sonraki duruşta aynı bölge karşılaştırılabilir.',
        ],
        'points' => ['Depolama tankı cidarı', 'Basınçlı kap', 'Erişimi zor kaynaklar'],
    ],
    'online-tank' => [
        'group' => 'ileri',
        'title' => 'Online Tank Taban Muayenesi',
        'lead' => 'Tank servisteyken taban taranır; boşaltma, temizlik ve kapalı alana giriş gerekmez.',
        'body' => [
            'Duruş, geçici depolama ve temizlik maliyeti oluşmadan tabandaki metal kaybı görülür. Risk esaslı muayene yaklaşımıyla bir sonraki iç kontrolün aralığı bu veriye göre konuşulabilir. Değerlendirmede API 653 mantığı esas alınır.',
            'Robotik tarayıcı, patlamaya karşı korumalı ve azotla süpürülen bir gövdededir. Manyetik akı kaçağı metal kaybını, ultrasonik dizi ise et kalınlığını ve kaplama kalınlığını tarar. Konum, üç boyutlu sonar ile tutulur.',
        ],
        'points' => ['Ürün boşaltmadan taban taraması', 'Çukurlaşma derinliği', 'Kaplama kalınlığı', 'RBI aralığı için veri'],
    ],
    'robotik-boru' => [
        'group' => 'ileri',
        'title' => 'Robotik Boru Hattı Muayenesi',
        'lead' => 'Hat içi robot, iç ve dış metal kaybı ile korozyonu tek girişten uzun mesafe tarar.',
        'body' => [
            'Araç, yaklaşık 8 inçten 55 inçe kadar çaplarda ve tek erişim noktasından yüzlerce metre ilerleyebilir. İzole veya astarlı hatlar, yol ve nehir geçişleri, gömülü rafineri boruları, buhar ve su hatları ile dokümantasyonu eksik hatlar tipik işlerdir.',
            'Klasik pig atılamayan bölümler de kapsanabilir: düşey hat, düşük akış, çap değişimi, barasız te ve kılıflı geçiş gibi. Sensör setinde elektromanyetik akustik ultrason, çatlak arama, çevre kaynak tarayıcısı, lazer profil ve kamera bulunur.',
            'Rapor; iç ve dış metal kaybı, yerel ve genel korozyon, gerilmeli korozyon çatlağı, laminasyon, çukurlaşma, kaynak hatası ve hizasızlığı ayırır. Çalışma öncesi hat azotla süpürülür ve oksijen oranı yüzde 10’un altında tutulur.',
        ],
        'points' => ['İzole ve gömülü hatlar', 'Pig atılamayan bölümler', 'Kompresör ve pompa istasyonları'],
    ],
    'varlik-onarim' => [
        'group' => 'ileri',
        'title' => 'Varlık Onarımı ve Mühendislik',
        'lead' => 'Muayene bulgusu, kalan ömür ve onarım kararına bağlanır.',
        'body' => [
            'Metal kaybı veya çatlak bulunduğunda parça hemen hurdaya ayrılmaz. Hizmete uygunluk değerlendirmesi, hangi bölgenin izleneceğini, hangisinin onarılacağını ve hangi koşullarda işletmeye devam edileceğini söyler.',
            'Onarım prosedürü malzeme, kaynak yöntemi ve devreye alma şartıyla birlikte hazırlanır. Amaç, aynı hatanın bir sonraki duruşta sürpriz olmamasıdır.',
        ],
        'points' => ['Kalan ömür', 'Hizmete uygunluk', 'Onarım prosedürü'],
    ],
    'cekme' => [
        'group' => 'tahribatli',
        'title' => 'Çekme Deneyi',
        'lead' => 'Akma, çekme dayanımı ve uzama, standart numune üzerinde ölçülür.',
        'body' => ['Ana malzeme ve kaynaklı birleştirmeler, ilgili ürün standardındaki kabul değerleriyle karşılaştırılır.'],
        'standards' => ['TS EN ISO 6892-1', 'TS EN ISO 4136', 'ASTM A370'],
    ],
    'darbe' => [
        'group' => 'tahribatli',
        'title' => 'Çentik Darbe Deneyi',
        'lead' => 'Malzemenin belirli sıcaklıkta darbe karşısındaki tokluğu ölçülür.',
        'body' => ['Kaynak metali, ısıdan etkilenen bölge ve ana malzeme ayrı ayrı denenebilir.'],
        'standards' => ['TS EN ISO 148-1', 'TS EN ISO 9016', 'ASTM A370'],
    ],
    'dwtt' => [
        'group' => 'tahribatli',
        'title' => 'Düşen Ağırlık Yırtılma Deneyi',
        'lead' => 'Hat borusu çeliğinde kırılmanın sünek mi gevrek mi ilerlediği bu deneyle görülür.',
        'body' => ['Sonuç, boru hattı çeliğinin düşük sıcaklık davranışı için ürün şartnamesine bağlanır.'],
        'standards' => ['TS EN 10274', 'API RP 5L3'],
    ],
    'egme' => [
        'group' => 'tahribatli',
        'title' => 'Eğme Deneyi',
        'lead' => 'Kaynaklı numune eğilerek birleştirmenin sünekliği ve kaynağın sağlamlığı kontrol edilir.',
        'body' => ['Kök, yüzey veya yan eğme, kaynak prosedürünün istediği konuma göre seçilir.'],
        'standards' => ['TS EN ISO 5173', 'ASTM A370'],
    ],
    'kirma' => [
        'group' => 'tahribatli',
        'title' => 'Kırma Deneyi',
        'lead' => 'Kaynak, kırılarak içindeki bağ hatası, gözenek ve nüfuziyet eksikliği açığa çıkarılır.',
        'body' => ['Kırık yüzey, kaynak prosedürü onayında makro kesite tamamlayıcı kanıt olur.'],
        'standards' => ['TS EN ISO 9017'],
    ],
    'makro' => [
        'group' => 'tahribatli',
        'title' => 'Makro İnceleme',
        'lead' => 'Kaynak kesiti dağlanarak paso sırası, nüfuziyet ve birleşme hataları büyütülerek incelenir.',
        'body' => ['Isıdan etkilenen bölgenin genişliği ve kök durumu aynı kesitte okunur.'],
        'standards' => ['TS EN ISO 17639'],
    ],
    'sertlik' => [
        'group' => 'tahribatli',
        'title' => 'Sertlik Deneyi',
        'lead' => 'Kaynak metali, ısı tesiri ve ana malzeme üzerinde sertlik taraması yapılır.',
        'body' => ['Yüksek sertlik, hidrojen çatlağı ve tokluk kaybı riskine işaret edebilir. Yöntem, malzeme ve yük aralığına göre seçilir.'],
        'standards' => ['TS EN ISO 6507-1', 'TS EN ISO 9015-1', 'ASTM E18', 'ASTM E10'],
    ],
    'kimyasal' => [
        'group' => 'tahribatli',
        'title' => 'Kimyasal Analiz',
        'lead' => 'Optik emisyon spektrometresi ile çeliğin kimyasal bileşimi doğrulanır.',
        'body' => ['Malzeme sertifikası ile saha parçası karşılaştırılır. Numune alma şekli analizi etkilediği için standarttaki hazırlığa uyulur.'],
        'standards' => ['ASTM E415', 'TS EN ISO 14284'],
    ],
    'numune' => [
        'group' => 'tahribatli',
        'title' => 'Deney Numunesi İşleme',
        'lead' => 'Çekme, darbe ve eğme numuneleri ilgili standardın ölçü toleransında hazırlanır.',
        'body' => ['Kaynak yeri, çentik konumu ve yüzey kalitesi deney sonucunu değiştirdiği için işleme, deney planıyla birlikte yürür.'],
        'standards' => [],
    ],
    'ucuncu-taraf' => [
        'group' => 'gozetim',
        'title' => 'İmalat ve Montaj Gözetimi',
        'lead' => 'Üretim adımları, alıcı ve imalatçıdan bağımsız denetçi tarafından yerinde izlenir.',
        'body' => [
            'Gözetçi; gelen malzemenin izlenebilirliğini, kaynak ağzını, kaynak sırasını, boyutları ve test paketini kontrol eder. Uygunsuzluk kapanmadan sonraki adıma geçilmesi önerilmez.',
            'Kapsam, projenin sözleşmesine göre daraltılır veya genişletilir. Rapor, fotoğraf ve uygunsuzluk numarasıyla arşivlenir.',
        ],
        'points' => [
            'Çelik imalat ve montaj',
            'Boru üretim ve montaj',
            'Çelik üretim süreçleri',
            'Döküm üretim',
            'Depolama tankı imalat ve montaj',
            'Basınçlı kap imalat ve montaj',
            'Köprü imalat ve montaj',
            'Vagon imalat',
            'Proses hatları',
            'İzometri ve test paketi',
        ],
    ],
    'periyodik-muayene' => [
        'group' => 'periyodik',
        'title' => 'Periyodik Kontrol',
        'lead' => 'Kaldırma ekipmanı, basınçlı kap, boru hattı ve depolama tankı dönemsel olarak kontrol edilir.',
        'body' => [
            'Muayene; görsel bütünlük, et kalınlığı, emniyet elemanları ve varsa mevzuatın istediği deneyleri kapsar. Bulgular, ekipmanın bir sonraki kullanıma uygun olup olmadığını söyler.',
            'Metal kaybı veya çatlak varsa kalan ömür ayrıca değerlendirilir. Onarım veya izleme kararı bu hesapla birlikte verilir.',
        ],
        'points' => ['Kaldırma ekipmanları', 'Basınçlı kaplar', 'Boru hatları', 'Depolama tankları'],
    ],
    'wps' => [
        'group' => 'kaynak',
        'title' => 'WPS ve WPQR',
        'lead' => 'Kaynak prosedürü, deneme kaynağı ve mekanik testlerle uygulama koduna göre onaylanır.',
        'body' => [
            'WPS, kaynakçının sahada uyacağı parametreleri yazar. WPQR, bu parametrelerle yapılan kaynağın testleri geçtiğini gösterir. Kapsam; malzeme grubu, kalınlık, çap ve pozisyona göre sınırlanır.',
            'Hangi kodun kullanılacağı sözleşmeye ve ekipmanın tasarım standardına bağlıdır.',
        ],
        'standards' => [
            'EN ISO 15609', 'EN ISO 15613', 'EN ISO 15614 serisi', 'EN 13134',
            'ASME Section IX', 'AWS D1.1', 'AWS D1.5', 'AWS D1.6', 'API 1104',
            'AD 2000 HP2/1', 'TRD 201',
        ],
    ],
    'kaynakci-egitim' => [
        'group' => 'kaynak',
        'title' => 'Kaynakçı Eğitimleri',
        'lead' => 'Belgelendirme sınavından önce, yöntem ve pozisyona göre uygulamalı eğitim verilir.',
        'body' => [
            'Eğitim; ark türü, sarf malzeme, pozisyon ve hata giderme pratiğini kapsar. Süreç numaraları, adayın çalışacağı yöntemle eşleştirilir.',
        ],
        'points' => [
            'Tozaltı kaynak (121, 125)',
            'TIG / GTAW (141, 142, 143, 145)',
            'MIG-MAG / GMAW ve FCAW (131, 135, 136, 138)',
            'Örtülü elektrot / SMAW (111)',
            'Oksi-asetilen (311)',
            'Lazer kaynak',
            'Plazma (15)',
        ],
    ],
    'boya-kaplama' => [
        'group' => 'boya',
        'title' => 'Boya ve Kaplama Deneyleri',
        'lead' => 'Kaplama malzemesi laboratuvarda, uygulanmış film ise sahada test edilir.',
        'body' => [
            'Toz ve sıvı sistemlerde yoğunluk, viskozite, kür, camsı geçiş ve eriyik akış gibi özellikler malzeme kabulünde kullanılır. Uygulanmış filmde yapışma, gözenek, sertlik ve katodik ayrışma bakılır.',
        ],
        'points' => [
            'Yoğunluk ve viskozite', 'Çekme ve bükme', 'Elek analizi', 'Kaplama soyulma',
            'Gözenek', 'DSC ve kürlenme', 'MFR', 'Toz epoksi tane boyutu ve yoğunluk',
            'Islak sünger', 'Shore D sertlik', 'Pull-off', 'Indentation', 'Holiday',
            'Katodik ayrışma', 'Cross-cut ve X-cut', 'Asit karışım',
        ],
    ],
    'ndt-personel' => [
        'group' => 'belge',
        'title' => 'NDT Personel Belgelendirme',
        'lead' => 'Tahribatsız muayene personeli, yöntem ve seviye bazında değerlendirilir.',
        'body' => [
            'Program EN ISO 9712 seviye yapısını esas alır. Adaydan başvuru, görme yeterliliği ve endüstriyel deneyim kaydı istenir. Belgenin kapsamı yöntem, sektör ve seviye ile sınırlıdır.',
            'Belge kullanımı sözleşmeyle tanımlanır. Sorgulama, belge numarasından yapılır.',
        ],
        'standards' => ['EN ISO 9712'],
    ],
    'kaynakci-belge' => [
        'group' => 'belge',
        'title' => 'Kaynakçı ve Operatör Belgelendirme',
        'lead' => 'Kaynakçı ve kaynak operatörü, süreç ve pozisyon kapsamında sınanır.',
        'body' => [
            'Elle kaynak EN ISO 9606, mekanize ve otomatik kaynak ISO 14732 çerçevesinde ele alınır. Kapsam; süreç, malzeme grubu, kalınlık ve pozisyonla sınırlanır.',
        ],
        'standards' => ['EN ISO 9606', 'ISO 14732'],
    ],
    'egitim-akademi' => [
        'group' => 'egitim',
        'title' => 'Tahribatsız Muayene Eğitimleri',
        'lead' => 'Yöntem eğitimleri ve sınavlar, ilan edilen takvime göre açılır.',
        'body' => [
            'Eğitim; teori, uygulama ve sınav bölümlerinden oluşur. Kontenjan ve ücret dönemseldir. Güncel takvim merkez ofisten paylaşılır.',
        ],
        'points' => ['UT, RT, PT, MT ve VT', 'Gelişmiş ultrason teknikleri', 'Sınav tarihleri'],
    ],
    'liman-tank' => [
        'group' => 'deniz',
        'title' => 'Liman ve Tank Sahası Sörveyi',
        'lead' => 'Yükün limanda ve tank sahasında kararlaştırılan miktar ve durumda olduğunu izleriz.',
        'body' => [
            'Konteyner ve dökme yükte miktar kontrolü ile malın iyi durumda teslimi, deniz taşımasının temel kaydıdır. Gözetim, sözleşme şartlarının sahada karşılanıp karşılanmadığını raporlar.',
        ],
    ],
    'yuk-miktari' => [
        'group' => 'deniz',
        'title' => 'Yük Miktarı Sörveyi',
        'lead' => 'Yükleme ve tahliyede oluşan hasarın yeri, nedeni ve büyüklüğü tespit edilir.',
        'body' => [
            'Hasar yükte olabileceği gibi geminin yapısında veya ekipmanında da olabilir. Rapor, olay anındaki gözleme dayanır ve sorumluluğun ayrılmasına yardımcı olur.',
            'Dökme yük gemilerinde, gemi ile liman arasındaki yükleme düzeni gemide aşırı gerilme ve fiziksel hasar riskini azaltacak şekilde izlenir.',
        ],
    ],
    'yukleme-oncesi' => [
        'group' => 'deniz',
        'title' => 'Yükleme Öncesi Kontroller',
        'lead' => 'Ambar, ağırlık kaydı ve bunker miktarı yüklemeden önce bağımsız kontrol edilir.',
        'body' => [
            'Sörveyör, kiralama kapsamındaki ve kapsam dışındaki bunker ölçümleri ile kargo ambarlarının yüklemeye uygunluğunu yerinde bakar.',
            'Yüklenen veya boşaltılan miktar hesaplanır ve imzalanan miktar sözleşmesiyle karşılaştırılarak raporlanır.',
        ],
    ],
    'konteyner-istif' => [
        'group' => 'deniz',
        'title' => 'Konteyner Stok ve İstif Emniyeti',
        'lead' => 'Liman ve kıyı tesisinde konteynerin doğru istiflendiği ve bağlandığı kontrol edilir.',
        'body' => [
            'Ana liman, varış ve aktarmada istifleme ile bağlama hesabı izlenir. Ağır ve hacimli yükte bağlama hesabı ve kaynak kontrolü ayrıca bakılır.',
            'Amaç, sevkiyat öncesi hasarlı veya güvensiz istifin yola çıkmadan görülmesidir.',
        ],
    ],
    'gemi-operasyon' => [
        'group' => 'deniz',
        'title' => 'Gemi Yükleme, Boşaltma ve Aktarma',
        'lead' => 'Genel kargo ve parçalı yükün ambara alınması, tahliyesi ve aktarılması izlenir.',
        'body' => [
            'Parçalı yük kutu, paket, varil veya paletle ambardaki yerine konur. Yük çoğu zaman gemi gelmeden liman ambarına alınır, sonra gemiye verilir. Tahliye aynı sıranın tersidir.',
            'Planlama uygunsa tahliye edilen yük, liman istifine girmeden gümrük işlemiyle ilgilisine de teslim edilebilir. Gözetim bu akıştaki hasar ve sayım farkını kaydeder.',
        ],
    ],
    'lashing' => [
        'group' => 'deniz',
        'title' => 'Lashing Gözetimi',
        'lead' => 'Ambar, kamyon ve konteyner içindeki bağlama malzemesi ve uygulaması kontrol edilir.',
        'body' => [
            'Uygunsuz bağlama yerinde tespit edilir ve düzeltici öneri yazılır. Bağlama uygunsa bu durum ayrı bir raporla kapatılır.',
        ],
    ],
];

foreach ($groups as $key => &$group) {
    $group['services'] = [];
}
unset($group);

foreach ($services as $slug => $service) {
    $groups[$service['group']]['services'][] = $slug;
}

return ['groups' => $groups, 'services' => $services];
