<?PHP
/**
 * T.C. Kimlik No Doğrulama
 * @category   CategoryName
 * @package    PackageName
 * @author     Barış Demirdelen <b.demirdelen@yahoo.com>
 */

function validation($tc, $ad, $soyad, $dogumYili){
    $post_data = '<?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
        <soap:Body>
            <TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
                <TCKimlikNo>' . $tc . '</TCKimlikNo>
                <Ad>' . $ad . '</Ad>
                <Soyad>' . $soyad . '</Soyad>
                <DogumYili>' . $dogumYili . '</DogumYili>
            </TCKimlikNoDogrula>
        </soap:Body>
    </soap:Envelope>';
    $ch = curl_init();
    $options = array(
    CURLOPT_URL => 'https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $post_data,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HEADER => false,
    CURLOPT_HTTPHEADER => array(
        'POST /Service/KPSPublic.asmx HTTP/1.1',
        'Host: tckimlik.nvi.gov.tr',
        'Content-Type: text/xml; charset=utf-8',
        'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"',
        'Content-Length: ' . strlen($post_data)
    )
    );
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
    return strip_tags($response);
}
?>
