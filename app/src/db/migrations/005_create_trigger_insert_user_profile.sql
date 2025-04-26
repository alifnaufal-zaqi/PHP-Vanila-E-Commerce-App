CREATE FUNCTION add_user_profile()
        RETURNS TRIGGER AS $$
        BEGIN
        INSERT INTO user_profiles (id_user, phone, address, profile_picture, gender)
        VALUES (NEW.id_user, NULL, NULL, NULL, NULL);
        RETURN NEW;
        END;
        $$ LANGUAGE plpgsql;

CREATE TRIGGER add_user_profile_trigger
            AFTER INSERT ON users
            FOR EACH ROW
            EXECUTE FUNCTION add_user_profile();