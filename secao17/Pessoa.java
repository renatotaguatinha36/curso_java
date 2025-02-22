package secao17;

public class Pessoa {
    

    private String nome;
    private String email;
    private int idade;

    public void setNome(String nome) {
        // THIS -> OBJETO
        // this = este objeto
        this.nome = nome;
    }

    public String getNome() {
        return nome;
    }

    public String getEmail() {
        return this.email;
    }

    public void setEmail(String email) {
        this.email = email;
    }


    public void setIdade(int idade) {
        // THIS -> OBJETO
        this.idade = idade;
    }

    public int getIdade() {
        return idade;
    }


    public Pessoa(String nome, int idade) {
        this.nome = nome;
        this.idade = idade;
    }

    public Pessoa() {
    }

    @Override
    public String toString() {
        return "{" +
            " nome='" + getNome() + "'" +
            ", email='" + getEmail() + "'" +
            ", idade='" + getIdade() + "'" +
            "}";
    }

}
