<?php
class User {
    //klasa user ma zawierać wszystkie informacje i czynności związane z użytkownikiem portalu
    //modelem w bazie danych jest tabela user

    static function Register(string $email, string $password) : bool {
        //poniższa funkcja odpowiada za dodanie użytkownika do właściwej tabeli w bazie danych
        //user{id INT, email VARCHAR(128), password VARCHAR(128)}

        //skonwertuj hasło do hasha
        $passwordHash = password_hash($password, PASSWORD_ARGON2I);


        //połączenie do bazy danych
        $db = new mysqli('localhost', 'root', '', 'friendbook');
        //kwerenda do bazy danych
        $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
        //zapytanie
        $q = $db->prepare($sql);
        //podstaw dane
        $q->bind_param("ss", $email, $passwordHash);

        //wyślij zapytanie
        $result = $q->execute();
        //zwróć wynik rejestracji
        return $result;
    }
    static function Login(string $email, string $password) : bool {
        //poniższa funkcja odpowiada za logowanie użytkownika
        //połączenie do bazy danych
        $db = new mysqli('localhost', 'root', '', 'friendbook');
        //tworzymy w języku SQL zapytanie, tam gdzie chcemy uzyć
        //zmiennych wstawiamy "?"
        $sql = "SELECT * FROM user WHERE email = ?";
        //tworzymy obiekt zapytania
        $q = $db->prepare($sql);
        //Podstawiamy pod znaki zapytania zmienne w kolejności
        //zaistnienia w kwerendzie
        $q->bind_param("s", $email);
        //wykonujemy kwerendę
        $result = $q->execute();
        //jeśli kwerenda nie powiodła się zwróć false
        if(!$result)
            return false;
        //chainowanie funkcji
        //$row to będzie jeden wiersz z bazy danych, potencjalnie
        //zawierający naszego użytkownika
        $row = $q->get_result()->fetch_assoc();
        //sprawdz czy hasło z formularza pasuje do hasha z bazy
        if(password_verify($password, $row['password']))
        {
            //na tym etapie wiemy, że hasło pasuje
            //poki co zwróć true jeśli jest zalogowany lub false jeśli nie
            return true;
        }
        else 
            return false;
        
    }
}
?>