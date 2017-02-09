<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 06/02/17
 * Time: 21:11
 */


function generateEmail($country,$pack,$linkCreditCard,$price,$coinsPrice,$paysafecardEn,$paysafecardIt)
{
    /*Global Variable*/
    $headers = "From: satopenvalidate@gmail.com\r\n";
    $headers .= "Reply-To: satopenvalidate@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $warningMessageIt = '<br>
    <b>-ATTENZIONE:</b> Non scrivere nessuna nota quando fai il pagamento altrimenti verra bannato sia il nostro che il tuo account (<em><b>invieremo subito il rimborso se scrivi qualcosa nelle note di pagamento</b></em>). Se ti viene chiesto vendiamo ebooks. <font color="blue"> Non scrivere mai commenti durante il pagamento, parole come cccam o cline o simili</font> <b>causano il ban del tuo e del nostro e tuo account da parte del loro software automatico. </b><br>
    <br><b>-IMPORTANTE DOPO IL PAGAMENTO</b></font><br>
    <b><em>Valida il tuo pagamento e attendi max 48 ore per processare esso. Riceverai la nuova cline o il rinnovo in massimo 48h dalla validazione)</em>: <a href="http://www.satopen.cc/correct-payment.html" target="_blank">http://www.satopen.cc/correct-payment.html<br><b></a> . </b>';

    $warningMessageEn = '<br>
    <b>-NOTE:</b> Do not write a note when you make a payment (<em><b>we will send back money if you write any note on payment</b></em>). We are showing the payment as web services ex Ebooks.<font color="blue"> Never write keyword like cccam, digital +, cline or similar words in the comments of the payment.</font> <b>This cause the ban of your and our account by ecommerce system (automatic software notice it). <u>Do not write any comment in payment.</u></b><br>
    <br><b>-IMPORTANT AFTER PAYMENT</b></font><br>
    <b><em>Validate your payment and attemp max 48h for processing it. You receive new cline or renewal in max 48H</em>: <a href="http://www.satopen.cc/correct-payment.html" target="_blank">http://www.satopen.cc/correct-payment.html<br><b></a> . </b>';

    $mycommerceGuideIdCode = '<a href="http://goo.gl/P7Awoy">Guide Here</a>';
    $validateLink = 'http://www.satopen.cc/correct-payment.html';
    $skrillEmail = 'carminelopez@mail.com';
    $netellerEmail = 'carminelopez@mail.com';
    $bitcoinsAddress = '19U4cajjocy65FgATZHqpoPMG8ktRPdGXL';


    if ($country === "IT") {
        $bodyEmail = "
            <b> INFORMAZIONI PER IL PAGAMENTO</b><br>Package: <b>$pack</b><br>Prezzo: <b>$price</b> / <b>$coinsPrice <font color='red'>(50% Di Sconto se Paghi con Bitcoins!)</font></b> Euro/Bitcoin<br>
            
            <br><br>
            
            <br><strong>CREDIT CARD/VISA ELECTRON/MASTERCARD/POSTEPAY BY MyCommerce</strong>:<br>
            1. Link per il pagamento <b>$linkCreditCard</b><br>
            2. Salva il tuo ORDER-ID scritto nella pagina del carrello per validare il pagamento<br>
            3. Valida il tuo pagamento: $validateLink.<br>
            <em><br>Come trovo il mio order-id?: $mycommerceGuideIdCode<br><br></em>
            
            <br><b>NETELLER </b>:<br>
            1. Login nel tuo account Neteller<br>
            2. Clicca Trasferimento di denaro<br>
            3. Nel campo email scrivi: <b>$netellerEmail</b><br>
            4. Come importo scrivi: $price<br>
            5. Seleziona EUR come moneta.<br>
            6. Clicca Continua<br>
            7. Nel campo Messaggio lascia tutto vuoto. Non immettere alcuna informazione nei dettagli del pagamento o altre informazioni, la linea ti viene inviata all'indirizzo email che validerai nel passo successivo. Se scrivi qualcosa nei commenti del pagamento ti rimborsiamo immediatamente il pagamento e non accetteremo piu un tuo ordine.<br>
            8. Clicca Invia Denaro. Se ti viene chiesto indica che non e' richiesta nessuna spedizione.<br>
            9. Annota il codice id della transazione.
            10 Valida il tuo pagamento: $validateLink.	<br>
                       
            <br><strong>BITCOINS:</strong><br>
            1. Indirizzo:<b>$bitcoinsAddress</b><br>
            2. Invia l'esatta cifra riportata sopra: <b>$coinsPrice</b><br>
            3. Annota il tuo indirizzo Coins e il codice Hash della transazione, li dovrai usare nella validazione del pagamento<br>
            4. Valida il tuo pagamento: $validateLink.<br>
            <em>Se hai Postepay puoi comprare Bitcoins qui: http://www.postebit.it</em><br>
            
            <br><strong>SKRILL</strong>:<br>
            1. Accedi al tuo account Skrill<br>
            2. Clicca Invia Denaro<br>
            3. Email del destinatario = <b>$skrillEmail</b><br>
            4. Importo = $price<br>
            5. Salva il Numero transazione.<br>
            6. Valida il tuo pagamento: $validateLink.<br>
                              
            <br><strong>PAYSAFECARD:</strong><br>
            Info:<br>
            PaysafeCard offre PIN con tagli da 10,25,50,100 Euro.<br>
            NOTA: Non possiamo prelevare solo una parte del PIN (es solo 8E da un PIN di 10E), per cui verrà prelevato l'intero valore del PIN e accumulato come giorni di servizio.<br>NOTA2: Non possiamo accettare PIN dalla Germania<br>
            1. Acquista un Pin PaySafeCard:<b><br>$paysafecardIt<br></b>
            2. Valida il tuo pagamento qui $validateLink.<br>
            3. Seleziona il tuo pacchetto e come metodo PaysafeCard<br>
            4. Scrivi in 'Your id code transaction- Codice transazione' il tuo PIN PaySafeCard<br>
            5. Il costo del pacchetto verrà scalato dalla tua PaysafeCard<br>
            <em>Se per raggiungere l'importo sono necessari più di un PIN, scrivi ogni altro PIN nelle 'Note Addizionali'</em><br>Puoi acquistare paysafecard presso numerosi supermercati, tabaccai, distributori di benzina ed edicole.<br>
            
            $warningMessageIt";
    }

    else {
        $bodyEmail = "
           <b> INFO FOR PAYMENT</b><br>Package: <b>$pack</b><br>Price: <b>$price</b> / <b>$coinsPrice <font color='red'>(50% OFF if pay with Bitcoins!)</font></b>  Euro/Bitcoin
                       
            <br><br>
            
            <br><strong>CREDIT CARD/VISA ELECTRON/MASTERCARD/POSTEPAY BY MyCommerce</strong>:<br>
            1. Link to pay <b>$linkCreditCard</b><br>
            2. Save your ORDER-ID in checkout page for validate the payment<br>
            3. Validate your payment: $validateLink.<br>
            <em><br>How can find my order-id?: $mycommerceGuideIdCode<br><br></em>
                        
            <br><b>Neteller </b>:<br>
            1. Login into your Neteller account<br>
            2. Press on Money Transfer<br>
            3. In the To (Email) Field write: <b>$netellerEmail</b><br>
            4. In the amount write: $price<br>
            5. Choose EUR - Euros as currency.<br>
            6. Press Continue<br>
            7. In the Subject field, leave everything as default. Do not change anything. In the Message field, do not change anything kindly.<br>
            8. Press Send Money. If you are asked for shipping, please choose No Shipping Required.	<br>
            9. Press Note your code id of transactions.
            10. Validate your paymenth: $validateLink.<br>
            
            
            <br><strong>BITCOINS</strong>:<br>
            1. Address:<b>$bitcoinsAddress</b><br>
            2. Send the exact amount, write above: <b>$coinsPrice</b><br>
            3. Please note your BitCoins address and Hash code, you use will validate payment.<br>
            4. Validate your payment: $validateLink.<br>
            
            <br><strong>SKRILL</strong>:<br>
            1. Login in your Skrill account <br>
            2. Click on Send Money <br>
            3. Recipient email: = <b>$skrillEmail</b><br>
            4. Amount = $price<br>
            5. Save your Transaction ID.	<br>
            6. Validate your payment: $validateLink.<br>
                             
            <br><strong>PAYSAFECARD:</strong><br>
            Info:<br>
            PaysafeCard offer PINs worth 10, 25, 50 or 100 EUR.<br>
            NOTE: We can not withdraw only a portion of PIN (example just 8E from 10E PIN). So the full value of the PIN will be charged and accumulated as extra days.<br>NOTE2: We can't accept PIN CODE form Germany.<br>
            1. Buy a Pin PaySafeCard:<b><br>$paysafecardEn<br></b>
            2. Validate your payment here $validateLink.<br>
            3. Select your Package and method PaysafeCard<br>
            4. Write in 'Your id code transaction- Codice transazione' your PIN PaySafeCard<br>
            5. The cost of the package will be scaled from your PaysafeCard<br>
            <em>If to reach the amount, you need more than a PIN. Write all other Pin (with the amount to be withdrawn from it) in 'Additional notes'</em><br>Paysafecard is available at 500,000 sales outlets worldwide.<br>
            
            $warningMessageEn
";
    }
    return array($bodyEmail, $headers);
}

?>