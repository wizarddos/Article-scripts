<?php 

function runQuery(string $query, array $params=[]){
    $db = new PDO("mysql:host=localhost;dbname=view-counter", "root", "");
    try{
        $stmt = $db->prepare($query);
        $stmt->execute($params);

        if(!$stmt->rowCount()){
            return ["No result"];
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }catch(PDOException $e){
        return "Error occured";
    }
}

function getViews(){
    return runQuery("SELECT * FROM `views`")['count'];
}

function pageVisited(){
    $currentVisits = runQuery("SELECT * FROM `views`")['count'];
    $currentVisits++;
    runQuery("UPDATE `views` SET `count` = ?", [$currentVisits]);
} 