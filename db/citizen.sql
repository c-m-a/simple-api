CREATE TABLE public.citizens (
    id integer NOT NULL,
    full_name character varying(64) NOT NULL,
    last_name character varying(64) NOT NULL,
    email character varying(32) NOT NULL,
    filename character varying(128) NOT NULL,
    document_number character varying(32) NOT NULL,
    document_type character varying(1) NOT NULL,
    dob date,
    mobile_phone character varying(16) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


--
-- TOC entry 196 (class 1259 OID 49169)
-- Name: guests_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.citizens_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2942 (class 0 OID 0)
-- Dependencies: 196
-- Name: guests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.citizens_id_seq OWNED BY public.citizens.id;


--
-- TOC entry 2812 (class 2604 OID 49174)
-- Name: guests id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.citizens ALTER COLUMN id SET DEFAULT nextval('public.citizens_id_seq'::regclass);


--
-- TOC entry 2814 (class 2606 OID 49176)
-- Name: guests guests_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.citizens
    ADD CONSTRAINT citizens_pkey PRIMARY KEY (id);
