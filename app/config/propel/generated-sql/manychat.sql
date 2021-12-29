
BEGIN;

-----------------------------------------------------------------------
-- department
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "department" CASCADE;

CREATE TABLE "department"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- project
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "project" CASCADE;

CREATE TABLE "project"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- employee
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "employee" CASCADE;

CREATE TABLE "employee"
(
    "id" serial NOT NULL,
    "first_name" VARCHAR(255) NOT NULL,
    "last_name" VARCHAR(255) NOT NULL,
    "gender" CHAR NOT NULL,
    "birthday" DATE,
    "salary" DOUBLE PRECISION,
    "department_id" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- project_employee
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "project_employee" CASCADE;

CREATE TABLE "project_employee"
(
    "project_id" INTEGER NOT NULL,
    "employee_id" INTEGER NOT NULL,
    CONSTRAINT "IX_project_employee" UNIQUE ("project_id","employee_id")
);

ALTER TABLE "employee" ADD CONSTRAINT "employee_fk_daecba"
    FOREIGN KEY ("department_id")
    REFERENCES "department" ("id")
    ON DELETE SET NULL;

ALTER TABLE "project_employee" ADD CONSTRAINT "project_employee_fk_601850"
    FOREIGN KEY ("project_id")
    REFERENCES "project" ("id")
    ON DELETE CASCADE;

ALTER TABLE "project_employee" ADD CONSTRAINT "project_employee_fk_e9e6d3"
    FOREIGN KEY ("employee_id")
    REFERENCES "employee" ("id")
    ON DELETE CASCADE;

COMMIT;
