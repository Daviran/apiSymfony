BEGIN;

-- on le rend en théorie idempotent avec les drop table au départ. en théorie, car les clés étrangères empeche le relancement du script. 
DROP TABLE IF EXISTS "orders";

DROP TABLE IF EXISTS "product";

DROP TABLE IF EXISTS "user";

-- pour les innerjoin, c'est préférable de ne pas avoir les memes id en clé primaire.. d'ou le idc pour companies et ids pour application.
CREATE TABLE IF NOT EXISTS "orders" (
  "id" INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  "total_price" TEXT NOT NULL,
  "creation_date" TEXT
);

CREATE TABLE IF NOT EXISTS "product" (
  "id" INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  "orders_id" TEXT NOT NULL,
  "photo" TEXT,
  "price" TEXT
);

CREATE TABLE IF NOT EXISTS "user" (
  "id" INTEGER GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
  "email" TEXT,
  "firstname" TEXT,
  "lastname" TEXT
);

-- Create table
COMMIT;