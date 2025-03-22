import ServiceItem from './ServiceItem/ServiceItem'

const Service = ({services}) => {

    return (
        <div>
            <section className='service-block lg:mt-[100px] sm:mt-16 mt-10 mb-6'>
                <div className='container'>
                    <h3 className='heading3 text-center'>Our Sevices</h3>
                    <div className='list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10'>
                        {
                            services.length > 0 && services.slice(0,6).map((service,i)=>{
                                return <ServiceItem key={i} {...{ service,i:i+1 }} />
                            })
                        }
                    </div>                 
                </div>
            </section>            
        </div>
    );
};

export default Service;