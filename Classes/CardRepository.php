<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(array $cardData): void
    {
        $sql = "INSERT INTO ideas (Name, Type, Ability) VALUES (:name, :type, :ability)";
        $stmt = $this->databaseManager->connection->prepare($sql);
    
        $stmt->bindValue(':name', $cardData['name']);
        $stmt->bindValue(':type', $cardData['type']);
        $stmt->bindValue(':ability', $cardData['ability']);
    
        $stmt->execute();
    }

    public function find(int $id): ?array
{
    $sql = "SELECT Name, Type, Ability FROM ideas WHERE id = :id";
    $stmt = $this->databaseManager->connection->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $card = $stmt->fetch();

    return $card ?: null; // Return a card if it exists, otherwise return null
}

    // Get all
    public function get(): array
    {
        // TODO: Create an SQL query
        $sql = "SELECT Name, Type, Ability FROM ideas";

        // TODO: Use your database connection (see $databaseManager) and send your query to your database.
        $stmt = $this->databaseManager->connection->prepare($sql);
        $stmt->execute();

        // TODO: fetch your data at the end of that action.
        $cards = $stmt->fetchAll();

        // TODO: replace dummy data by real one
        return $cards;

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update(int $id, array $cardData): void
{
    $sql = "UPDATE ideas SET Name = :name, Type = :type, Ability = :ability WHERE id = :id";
    $stmt = $this->databaseManager->connection->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $cardData['name']);
    $stmt->bindValue(':type', $cardData['type']);
    $stmt->bindValue(':ability', $cardData['ability']);

    $stmt->execute();
}

public function delete(int $id): void
{
    $sql = "DELETE FROM ideas WHERE id = :id";
    $stmt = $this->databaseManager->connection->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->execute();
}   

}
