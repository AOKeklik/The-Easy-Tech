import React from 'react'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import useInViewAnimation from "@/hooks/useInViewAnimation"

const LeftSection = () => {
    const { ref, style } = useInViewAnimation({ direction: "left" })

    return <div
        ref={ref} 
        style={style}
        className='w-full xl:w-2/5'
    >
        <div className='infor bg-blue-500 rounded-xl p-10'>
            <div className='heading5 text-white'>Get it Touch</div>
            <div className='body3 text-white mt-2'>We will get back to you soon..</div>
            <div className='list-social flex flex-wrap items-center gap-3 md:mt-10 mt-6'>
                <a className='item rounded-full w-12 h-12 flex items-center justify-center bg-slate-200' href='https://facebook.com/' target='_blank'>
                    <i className='icon-facebook text-black'></i>
                </a>
                <a className='item rounded-full w-12 h-12 flex items-center justify-center bg-slate-200' href='https://linkedin.com/' target='_blank'>
                    <i className='icon-in text-black'></i>
                </a>
                <a className='item rounded-full w-12 h-12 flex items-center justify-center bg-slate-200' href='https://twitter.com/' target='_blank'>
                    <i className='icon-twitter text-black'></i>
                </a>
                <a className='item rounded-full w-12 h-12 flex items-center justify-center bg-slate-200' href='https://youtube.com/' target='_blank'>
                    <i className='icon-youtube text-black'></i>
                </a> 
            </div>
            <div className='list-more-infor md:mt-10 mt-6'>
                <div className='item flex items-center gap-3'>
                    <div className='flex items-center justify-center w-8 h-8 bg-white rounded-full flex-shrink-0'>
                        <Icon.Clock weight='bold' className='text-blue text-2xl' /> 
                    </div>
                    <div className='line-y'></div>
                    <div className='text-button normal-case text-white'>8AM - 6PM</div>
                </div>
                <div className='item flex items-center gap-3 mt-5'>
                    <div className='flex items-center justify-center w-8 h-8 bg-white rounded-full flex-shrink-0'>
                        <Icon.Phone weight='bold' className='text-blue text-2xl' /> 
                    </div>
                    <div className='line-y'></div>
                    <div className='text-button normal-case text-white'>454-454-545</div>
                </div>
                <div className='item flex items-center gap-3 mt-5'>
                    <div className='flex items-center justify-center w-8 h-8 bg-white rounded-full flex-shrink-0'>
                        <Icon.EnvelopeSimple weight='bold' className='text-blue text-2xl' /> 
                    </div>
                    <div className='line-y'></div>
                    <div className='text-button normal-case text-white'>support@easylearningbd.com</div>
                </div>
                <div className='item flex items-center gap-3 mt-5'>
                    <div className='flex items-center justify-center w-8 h-8 bg-white rounded-full flex-shrink-0'>
                        <Icon.MapPin weight='bold' className='text-blue text-2xl' /> 
                    </div>
                    <div className='line-y'></div>
                    <div className='text-button normal-case text-white'>ul. Kolegialna 15 09-410 Płock</div>
                </div> 
            </div> 
        </div> 
    </div>
};

export default LeftSection;