describe('User can Open Mahasiswa List Page', () => {
    it('Index Mahasiswa List', () => {
        cy.visit("http://127.0.0.1:8000/mahasiswa");
        cy.get('h2').should('have.text','JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG');
    });
    it('Create Mahasiswa', () => {
        cy.visit("http://127.0.0.1:8000/mahasiswa");
        cy.get('.btn-success').click();
        cy.get(':nth-child(2) > label').should('have.text','Nim');
        cy.get(':nth-child(3) > label').should('have.text','Nama');
        cy.get(':nth-child(4) > label').should('have.text','Jenis Kelamin');
        cy.get(':nth-child(5) > label').should('have.text','Tanggal Lahir');
        cy.get(':nth-child(6) > label').should('have.text','Kelas');
        cy.get(':nth-child(7) > label').should('have.text','Jurusan');
        cy.get(':nth-child(8) > label').should('have.text','Email');
        cy.get(':nth-child(9) > label').should('have.text','Alamat');
        cy.get(':nth-child(10) > label').should('have.text','Foto');
        cy.get('#Nim').type("2041720026",{force:true});
        cy.get('#Nama').type("Rosi Latansa Salsabela",{force:true});        
        cy.get('#Jenis_Kelamin').select('Perempuan').should('have.value', 'Perempuan')
        cy.get('#Tanggal_Lahir').type('2002-04-14',{force:true});
        cy.get('#Kelas').type("TI 3G",{force:true});
        cy.get('#Jurusan').type("Teknologi Informasi",{force:true});
        cy.get('#Email').type("rosi@gmail.com",{force:true});
        cy.get('#Alamat').type("Kediri",{force:true});        
        cy.get('#foto').selectFile('public/images/default-user.png')      
        cy.get('.btn').contains("Submit").and("be.enabled").click();
    });
})