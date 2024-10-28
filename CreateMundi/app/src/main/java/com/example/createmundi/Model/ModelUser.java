package com.example.createmundi.Model;

public class ModelUser {
    private String username, Mundos, Faccoes, Personagens;
    public ModelUser(String username, String mundos, String faccoes, String personagens) {
        this.username = username;
        Mundos = mundos;
        this.Faccoes = faccoes;
        this.Personagens = personagens;
    }

    @Override
    public String toString() {
        return
                "username='" + username + '\'' +
                "\nMundos='" + Mundos +'\'' +
                "\nFaccoes='" + Faccoes + '\'' +
                "\nPersonagens='" + Personagens + '\''
                ;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getMundos() {
        return Mundos;
    }

    public void setMundos(String mundos) {
        Mundos = mundos;
    }

    public String getFaccoes() {
        return Faccoes;
    }

    public void setFaccoes(String faccoes) {
        Faccoes = faccoes;
    }

    public String getPersonagens() {
        return Personagens;
    }

    public void setPersonagens(String personagens) {
        Personagens = personagens;
    }
}
