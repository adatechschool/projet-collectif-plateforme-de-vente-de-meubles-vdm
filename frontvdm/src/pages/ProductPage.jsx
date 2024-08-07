import { useParams, useLocation } from 'react-router-dom'
import styled from 'styled-components'

const Product = styled.div`
    display: flex;
    row-gap: 100px`

const Informations = styled.div``

const Image = styled.img`
    height: 30vh;
    border: 2px solid;
    margin: 10px 10px;`

const Title = styled.h2``

const Description = styled.p``

const Price = styled.p``


const ProductPage = () => {
  const { id } = useParams();
  const location = useLocation();
  const product = location.state;

  return (
    <>
      {product ? (
        <Product>
    
          <Image src={product.picture} alt={product.name} />
          <Informations>
          <Title>{product.name}</Title>
          <Description>{product.description}</Description>
          <Price>Prix: {product.price}€</Price>
          </Informations>
        </Product>
      ) : (
        <p>Produit indisponible</p>
      )}
    </>
  );
};

export default ProductPage;
